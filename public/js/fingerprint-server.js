const { SerialPort } = require('serialport');
const { ReadlineParser } = require('@serialport/parser-readline');
const WebSocket = require('ws');

// Prevent crashes on serial port errors
process.on('uncaughtException', (err) => {
    console.error('⚠️ Uncaught Exception:', err.message);
    // Ignore serial port disconnect errors to keep server running
});

process.on('unhandledRejection', (reason, promise) => {
    console.error('⚠️ Unhandled Rejection:', reason);
});

class FingerprintWebSocketServer {
    constructor(port = 8080) {
        this.port = port;
        this.wss = null;
        this.serialPort = null;
        this.clients = new Set();
        this.isScanning = false;

        this.init();
    }

    init() {
        // Create WebSocket server
        this.wss = new WebSocket.Server({
            port: this.port
        });

        console.log(`Fingerprint WebSocket server started on port ${this.port}`);

        this.setupWebSocket();
        this.discoverAndConnect();
    }

    setupWebSocket() {
        this.wss.on('connection', (ws) => {
            console.log('New client connected');
            this.clients.add(ws);

            ws.on('message', (message) => {
                this.handleMessage(ws, message);
            });

            ws.on('close', () => {
                console.log('Client disconnected');
                this.clients.delete(ws);
            });
            
            try {
                ws.send(JSON.stringify({
                    event: 'connection',
                    status: 'connected',
                    scanner: this.serialPort && this.serialPort.isOpen ? 'connected' : 'disconnected'
                }));
            } catch(e) {}
        });
    }

    async discoverAndConnect() {
        if (this.isScanning) return;
        this.isScanning = true;
        console.log('🔍 Scanning available ports...');
        
        let fallbackPort = null;

        try {
            const ports = await SerialPort.list();
            console.log('Available ports:', ports.map(p => `${p.path} (${p.manufacturer})`).join(', '));
            
            // Filter ports
            // Ignore Bluetooth and usually "Microsoft" which are virtual/internal
            const candidates = ports.filter(p => {
                const manu = (p.manufacturer || '').toLowerCase();
                return !manu.includes('bluetooth') && !manu.includes('microsoft'); 
            });

            if (candidates.length === 0) {
                console.log('⚠️ No obvious fingerprint readers found via manufacturer filter.');
                console.log('   Will try ALL ports as fallback (excluding Bluetooth).');
                 // Fallback to all non-bluetooth
                 const secondary = ports.filter(p => !(p.manufacturer||'').toLowerCase().includes('bluetooth'));
                 // Only use the fallback if 'candidates' was empty
                 if(secondary.length > 0) candidates.push(...secondary);
            }

            for (const portInfo of candidates) {
                console.log(`Trying to connect to ${portInfo.path}...`);
                
                // Test multiple baud rates
                const rates = [57600, 9600, 115200, 38400, 19200];
                
                for (const rate of rates) {
                    console.log(`   Testing ${portInfo.path} @ ${rate}...`);
                    const result = await this.testBaudRate(portInfo.path, rate);
                    
                    if (result === 'FOUND') {
                        console.log(`✅ FOUND DEVICE on ${portInfo.path} at ${rate} baud!`);
                        await this.connectFinal(portInfo.path, rate);
                        this.isScanning = false;
                        return;
                    } else if (result === 'OPEN_OK') {
                         // Keep track of the first port that opens, but don't stop searching for a better match
                        if (!fallbackPort) {
                            fallbackPort = { path: portInfo.path, rate: rate };
                        }
                    }
                }
            }

            // Si on a rien trouvé de certifié, on prend le "moins pire"
            if (fallbackPort) {
                console.log(`👉 Fallback: Connecting to ${fallbackPort.path} at ${fallbackPort.rate} (Best Effort)`);
                await this.connectFinal(fallbackPort.path, fallbackPort.rate);
                this.isScanning = false;
                return;
            }
            
            console.log('❌ Failed to connect to any fingerprint scanner.');
            this.isScanning = false;

        } catch (err) {
            console.error('Error listing ports:', err);
            this.isScanning = false;
        }
    }

    async connectFinal(portPath, rate) {
        return new Promise((resolve) => {
             this.serialPort = new SerialPort({
                path: portPath,
                baudRate: rate,
                autoOpen: true,
                dtr: true, 
                rts: false // Try disabling RTS, sometimes blocks generic drivers
            });
            
            // REMOVED ReadlineParser because it blocks binary data!
            // const parser = this.serialPort.pipe(new ReadlineParser({ delimiter: '\r\n' }));
            
            // Listen to RAW data events
            this.serialPort.on('data', (data) => this.handleScannerData(data));
            
            this.serialPort.on('error', (err) => {
                 this.serialPort = null;
                this.broadcast({ event: 'scanner_disconnected' });
            });
            
            this.serialPort.on('close', () => {
                this.serialPort = null;
                this.broadcast({ event: 'scanner_disconnected' });
            });
            
            this.serialPort.on('close', () => {
                this.serialPort = null;
                this.broadcast({ event: 'scanner_disconnected' });
            });

            console.log(`🚀 READY on ${portPath}`);
            console.log('ℹ️  Astuce: Appuyez sur "s" dans ce terminal pour simuler une capture si le lecteur ne répond pas.');

            this.setupKeyboardSimulation();
            
            this.broadcast({
                event: 'scanner_connected',
                port: portPath,
                baudRate: rate
            });

            // Handshake loop
            const handshaker = setInterval(() => {
                if(this.serialPort && this.serialPort.isOpen) this.sendHandshake();
            }, 2000);
            
            // Stop handshaking after 10 seconds
            setTimeout(() => clearInterval(handshaker), 10000);
            
            resolve(true);
        });
    }

    setupKeyboardSimulation() {
        if (this.keyboardHooked) return;
        this.keyboardHooked = true;
        
        const stdin = process.stdin;
        if (stdin.setRawMode) stdin.setRawMode(true);
        stdin.resume();
        stdin.setEncoding('utf8');

        stdin.on('data', (key) => {
            // Ctrl+C
            if (key === '\u0003') {
                process.exit();
            }
            // Press 's' to simulate
            if (key === 's' || key === 'S') {
                console.log('🔮 Simulation manuelle déclenchée...');
                this.broadcast({
                    event: 'capture_started',
                    finger: 'left_index',
                    timestamp: Date.now()
                });
                
                setTimeout(() => {
                    this.broadcast({
                        event: 'finger_detected',
                        timestamp: Date.now()
                    });
                }, 1000);

                setTimeout(() => {
                    // Image d'empreinte digitale générique (PNG Base64)
                    const fakeFingerprint = 'iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAhFBMVEUAAAD///8NDQ0TExMYGBgdHR0iIiInJycsLCwxMTE2NjY7Ozs/Pz9ERERISEhNTU1SUlJXszlbW1tgYGBlZWVqampwcHB1dXV6enp/f3+EhISKiouMjIyRkZGfn5+kpKSpqamurq6zs7O4uLi9vb3Dw8PIyMjNzc3T09PZ2dnd3d3i4uLo6Ojt7e3y8vL39/f///+Lw8bVAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAdhJREFUeNrt2t1SgzAQBeD0vjQUaxW04v//xQY86MzY3dmkS+c5Q5PJ7CQ7BFYTAAAAAAAAAAAAAAAAAAAAAADA/2W93u73h8P5fL3db/fr9XIZn2y93R8Oh/P5ervf7tfr5TI+2Xq7PxwO5/P1dr/dr9fLZXyy9XZ/OBzO5+vtfrtfr5fL+GTr7f5wOJzP19v9dr9eL5fxydbb/eFwOJ+vt/vtfr1eLuOTTe/3h8P5fL3db/fr9XIZn2y93R8Oh/P5ervf7r+s18tlfLL1dn84HM7n6+1+u1+vl8v4ZOt/94fD9na/3a/Xy2V8svV2fzgczufr7X67X6+Xy/hk6+3+cDicz9fb/Xa/Xi+X8cnW2/3he0432/12v14vl/HJ1tv94XA4n6+3++1+vV4u45Ott/vD4XA+X2/32/16vVzGJ1tv94fD4Xy+3u63+/V6uYxPtt7uD4fD+Xy93W/36/VyGZ9svd0fDofz+Xq73+7X6+UyPtl6uz8cDufz9Xa/3a/Xy2V8svV2fzgczufr7X67X6+Xy/hk6+3+cDicz9fb/Xa/Xi+X8cnW2/3hcDifr7f77X69Xi7jk623+8PhcD5fb/fb/Xq9XMYn25/7AwAAAAAAAAAAAAAAAAAAAAD41x4X2wW+2/7YSAAAAABJRU5ErkJggg==';
                    
                    this.broadcast({
                        event: 'capture_complete',
                        template: 'Rk1SACAyMAAAA...', // Fake template
                        image: fakeFingerprint,
                        quality: 95,
                        status: 'success',
                        timestamp: Date.now()
                    });
                     console.log('✅ Simulation envoyée au navigateur.');
                }, 2000);
            }
        });
    }

    sendHandshake() {
        console.log('🤝 Sending Handshake (VFY_PWD)...');
        // Command: Verify Password (0x13) - Default 00000000
        // Pkt: EF 01 FF FF FF FF 01 00 07 13 00 00 00 00 00 1B
        const cmd = Buffer.from([0xEF, 0x01, 0xFF, 0xFF, 0xFF, 0xFF, 0x01, 0x00, 0x07, 0x13, 0x00, 0x00, 0x00, 0x00, 0x00, 0x1B]);
        this.sendToScanner(cmd);
    }

    async testBaudRate(portPath, baudRate) {
        return new Promise((resolve) => {
            const port = new SerialPort({
                path: portPath,
                baudRate: baudRate,
                autoOpen: false,
                dtr: true, // Needed for generic drivers
                rts: true
            });

            const timeoutTime = 600; 
            let resolved = false;
            let timer = null;
            let openSuccess = false;

            const cleanup = (status) => {
                if (resolved) return;
                resolved = true;
                if (timer) clearTimeout(timer);
                port.removeAllListeners();
                
                if (port.isOpen) {
                    port.close(() => resolve(status));
                } else {
                    resolve(status);
                }
            };

            port.on('error', (err) => cleanup('ERROR'));

            try {
                port.open((err) => {
                    if (err) {
                        cleanup('ERROR');
                        return;
                    }
                    openSuccess = true;

                    port.on('data', (data) => {
                        if (data.includes(Buffer.from([0xEF, 0x01]))) {
                            cleanup('FOUND');
                        }
                    });

                    // Send VFY_PWD (Handshake) instead of GetImage for testing connection
                    // Pkt: EF 01 FF FF FF FF 01 00 07 13 00 00 00 00 00 1B
                    // Password default is 00 00 00 00
                    const handshake = Buffer.from([0xEF, 0x01, 0xFF, 0xFF, 0xFF, 0xFF, 0x01, 0x00, 0x07, 0x13, 0x00, 0x00, 0x00, 0x00, 0x00, 0x1B]);
                    
                    port.write(handshake, (writeErr) => {
                        if (writeErr) cleanup('ERROR');
                    });

                    timer = setTimeout(() => {
                        // Si le timeout expire mais que le port s'est bien ouvert, on renvoie OPEN_OK
                        cleanup(openSuccess ? 'OPEN_OK' : 'ERROR');
                    }, timeoutTime);
                });
            } catch (e) {
                cleanup('ERROR');
            }
        });
    }
    
    // ... rest of methods
    
    handleMessage(ws, message) {
        console.log('📩 WebSocket Message Received:', message.toString());
        try {
            const data = JSON.parse(message);

            switch (data.action) {
                case 'capture':
                    console.log('📸 Processing capture request for:', data.finger);
                    this.handleCaptureRequest(ws, data);
                    break;

                case 'ping':
                    console.log('🏓 Ping received');
                    ws.send(JSON.stringify({
                        event: 'pong',
                        timestamp: Date.now()
                    }));
                    break;

                case 'command':
                    console.log('⚙️ Custom command:', data.command);
                    this.sendToScanner(data.command);
                    break;
                
                default:
                    console.warn('❓ Unknown action:', data.action);
            }
        } catch (error) {
            console.error('Message handling error:', error);
        }
    }

    handleCaptureRequest(ws, data) {
        // Send command to scanner
        const command = this.getCaptureCommand(data.finger);
        console.log(`🔌 Sending to Serial (${this.serialPort ? this.serialPort.path : 'No Port'}):`, command);
        
        this.sendToScanner(command);

        // Acknowledge request
        ws.send(JSON.stringify({
            event: 'capture_started',
            finger: data.finger,
            timestamp: Date.now()
        }));
    }

    handleScannerData(data) {
        console.log('Scanner data:', data.toString());
        // ... passthrough
        const parsed = this.parseScannerResponse(data.toString());
        if (parsed) this.broadcast(parsed);
    }

        parseScannerResponse(data) {
            // Parse based on your scanner's protocol
            if (data.includes('FINGER DETECTED')) {
                return {
                    event: 'finger_detected',
                    timestamp: Date.now()
                };
            }

            if (data.includes('CAPTURE SUCCESS')) {
                return {
                    event: 'capture_complete',
                    template: this.extractTemplate(data),
                    image: this.extractImage(data),
                    quality: this.extractQuality(data),
                    timestamp: Date.now()
                };
            }

            if (data.includes('QUALITY')) {
                const quality = parseInt(data.match(/QUALITY: (\d+)/)?.[1] || 0);
                return {
                    event: 'quality_update',
                    quality: quality,
                    timestamp: Date.now()
                };
            }

            return null;
        }

        extractTemplate(data) {
            // Extract template from scanner data
            // Implementation depends on your scanner
            return Buffer.from(data).toString('base64');
        }

        extractImage(data) {
            // Extract image from scanner data
            return Buffer.from(data).toString('base64');
        }

        extractQuality(data) {
            // Extract quality score
            const match = data.match(/QUALITY:(\d+)/);
            return match ? parseInt(match[1]) : 0;
        }

        sendToScanner(command) {
            if (this.serialPort && this.serialPort.isOpen) {
                // Si la command est un tableau ou Buffer, on l'envoie tel quel
                if (Array.isArray(command) || Buffer.isBuffer(command)) {
                    const buf = Buffer.from(command);
                    console.log('🔌 Sending Binary:', buf.toString('hex').toUpperCase());
                    this.serialPort.write(buf);
                } else {
                    console.log('🔌 Sending Text:', command);
                    this.serialPort.write(command + '\r\n');
                }
            }
        }

        getCaptureCommand(finger) {
            // Protocole standard pour modules optiques (AS608/R307/MPH)
            // Header: EF 01, Addr: FF FF FF FF, Type: 01 (Cmd), Len: 00 03, Cmd: 01 (GenImg), Sum: 00 05
            // Cette commande demande au lecteur de scanner une image
            // Commande "GetImage"
            return [0xEF, 0x01, 0xFF, 0xFF, 0xFF, 0xFF, 0x01, 0x00, 0x03, 0x01, 0x00, 0x05];
        }

        handleScannerData(data) {
            console.log('📥 Scanner Data (Hex):', data.toString('hex').toUpperCase());
            
            const hex = data.toString('hex').toUpperCase();

            // Analyse de la réponse du protocole AS608/MPH
            // Structure réponse: EF 01 ... [Code Confirmation] [Checksum]
            // Le code confirmation est souvent à l'index 9 (soit le 10ème octet) dans une réponse standard
            // Exemple ACK succès: EF 01 FF FF FF FF 07 00 03 00 00 0A (00 = Success) 
            
            if (hex.startsWith('EF01')) {
                // C'est bien notre scanner
                console.log('✅ Valid Reader Response Header');
                
                // Si la réponse contient '07' (Acknowledge packet type)
                if (hex.includes('07')) {
                    // On envoie un événement 'processing' au client pour dire que le lecteur travaille
                     this.broadcast({
                        event: 'finger_detected', // On utilise cet event pour montrer de l'activité
                        message: 'Lecteur en communication...',
                        timestamp: Date.now()
                    });
                }
            } else {
                 console.log('⚠️ Unknown data format received from COM port');
            }
        }

        broadcast(data) {
            const message = JSON.stringify(data);
            this.clients.forEach(client => {
                if (client.readyState === WebSocket.OPEN) {
                    client.send(message);
                }
            });
        }
    }
    // Start server
    const server = new FingerprintWebSocketServer(8080);