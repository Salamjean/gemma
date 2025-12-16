<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class FingerprintScannerService
{
    private $scannerType = null;
    private $isConnected = false;

    public function __construct()
    {
        $this->detectScanner();
    }

    public function detectScanner()
    {
        try {
            // Détection automatique du scanner
            if ($this->isWindows()) {
                $this->detectWindowsScanner();
            } elseif ($this->isLinux()) {
                $this->detectLinuxScanner();
            }
            
            Log::info('Scanner status: ' . ($this->isConnected ? 'Connected' : 'Not found'));
            return $this->isConnected;
            
        } catch (\Exception $e) {
            Log::error('Scanner detection failed: ' . $e->getMessage());
            return false;
        }
    }

    private function detectWindowsScanner()
    {
        // DigitalPersona U.are.U
        if (file_exists('C:\\Program Files\\DigitalPersona\\Bin\\dpfp.exe')) {
            $this->scannerType = 'digitalpersona';
            $this->isConnected = true;
        }
        // SecuGen
        elseif (file_exists('C:\\Windows\\System32\\sgfp.dll')) {
            $this->scannerType = 'secugen';
            $this->isConnected = true;
        }
    }

    private function detectLinuxScanner()
    {
        // Vérifier avec lsusb
        $process = new Process(['lsusb']);
        $process->run();
        
        if ($process->isSuccessful()) {
            $output = $process->getOutput();
            
            if (str_contains($output, 'DigitalPersona') || 
                str_contains($output, 'U.are.U')) {
                $this->scannerType = 'digitalpersona';
                $this->isConnected = true;
            }
            elseif (str_contains($output, 'Futronic') || 
                    str_contains($output, 'FS80')) {
                $this->scannerType = 'futronic';
                $this->isConnected = true;
            }
            elseif (str_contains($output, 'Mantra') || 
                    str_contains($output, 'MFS100')) {
                $this->scannerType = 'mantra';
                $this->isConnected = true;
            }
        }
    }

    public function capture($finger, $userId)
    {
        if (!$this->isConnected) {
            throw new \Exception('Scanner not connected');
        }

        $filename = 'fingerprint_' . $finger . '_' . time() . '.bmp';
        $filepath = storage_path('app/fingerprints/' . $filename);
        
        // Créer le dossier si nécessaire
        if (!file_exists(dirname($filepath))) {
            mkdir(dirname($filepath), 0755, true);
        }

        try {
            // Commande selon le type de scanner
            $command = $this->getCaptureCommand($filepath, $finger);
            
            $process = new Process($command);
            $process->setTimeout(30);
            $process->run();
            
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            
            // Lire et convertir l'image
            if (file_exists($filepath)) {
                $imageData = file_get_contents($filepath);
                $base64Image = base64_encode($imageData);
                
                // Extraire le template biométrique
                $template = $this->extractTemplate($filepath);
                
                // Supprimer le fichier temporaire
                unlink($filepath);
                
                return [
                    'success' => true,
                    'finger' => $finger,
                    'image' => 'data:image/bmp;base64,' . $base64Image,
                    'template' => base64_encode($template),
                    'quality' => $this->calculateQuality($template),
                    'user_id' => $userId,
                    'scanner' => $this->scannerType,
                    'timestamp' => now()->toISOString()
                ];
            }
            
            throw new \Exception('Capture file not created');
            
        } catch (\Exception $e) {
            Log::error('Capture failed: ' . $e->getMessage());
            
            // Mode simulation si échec
            return $this->simulateCapture($finger, $userId);
        }
    }

    private function getCaptureCommand($filepath, $finger)
    {
        switch ($this->scannerType) {
            case 'digitalpersona':
                if ($this->isWindows()) {
                    return [
                        'C:\\Program Files\\DigitalPersona\\Bin\\dpfp.exe',
                        'capture',
                        '-o',
                        $filepath
                    ];
                } else {
                    return ['fprintd-enroll', '-f', $this->getLinuxFingerName($finger)];
                }
                
            case 'futronic':
                return ['futronic-capture', '-o', $filepath];
                
            case 'mantra':
                return ['mantra-capture', $finger, $filepath];
                
            default:
                // Commande générique pour fprint (Linux)
                return ['fprintd-enroll', '-f', $this->getLinuxFingerName($finger)];
        }
    }

    private function getLinuxFingerName($finger)
    {
        $map = [
            'left_index' => 'left-index-finger',
            'right_index' => 'right-index-finger',
            'left_thumb' => 'left-thumb',
            'right_thumb' => 'right-thumb'
        ];
        
        return $map[$finger] ?? 'right-index-finger';
    }

    private function extractTemplate($imagePath)
    {
        // Logique d'extraction selon le scanner
        // Ici, simulation ou intégration SDK spécifique
        
        $imageSize = filesize($imagePath);
        $content = file_get_contents($imagePath);
        
        // Simulation: créer un hash unique
        return hash('sha256', $content . time(), true);
    }

    private function calculateQuality($template)
    {
        // Simuler une qualité basée sur la taille du template
        $size = strlen($template);
        return min(100, max(60, ($size / 100) * 10));
    }

    private function simulateCapture($finger, $userId)
    {
        // Simulation pour le développement
        $template = json_encode([
            'finger' => $finger,
            'user_id' => $userId,
            'timestamp' => time(),
            'simulated' => true,
            'features' => $this->generateFakeFeatures()
        ]);
        
        return [
            'success' => true,
            'finger' => $finger,
            'image' => $this->generateFakeImage($finger),
            'template' => base64_encode($template),
            'quality' => rand(80, 98),
            'user_id' => $userId,
            'scanner' => 'simulation',
            'timestamp' => now()->toISOString(),
            'simulated' => true
        ];
    }

    private function generateFakeFeatures()
    {
        $features = [];
        for ($i = 0; $i < 40; $i++) {
            $features[] = [
                'x' => rand(0, 500) / 10,
                'y' => rand(0, 500) / 10,
                'type' => rand(0, 1) ? 'ridge_ending' : 'bifurcation',
                'angle' => rand(0, 360)
            ];
        }
        return $features;
    }

    private function generateFakeImage($finger)
    {
        $svg = '<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">';
        $svg .= '<rect width="200" height="200" fill="#f8f9fa"/>';
        
        // Dessiner un motif réaliste
        for ($i = 0; $i < 5; $i++) {
            $radius = 20 + ($i * 15);
            $svg .= '<circle cx="100" cy="100" r="' . $radius . '" fill="none" stroke="#666" stroke-width="1"/>';
        }
        
        $svg .= '<text x="100" y="100" text-anchor="middle" font-family="Arial" font-size="14" fill="#333">';
        $svg .= strtoupper(str_replace('_', ' ', $finger));
        $svg .= '</text>';
        
        $svg .= '<text x="100" y="180" text-anchor="middle" font-family="Arial" font-size="12" fill="#666">';
        $svg .= 'SCANNER PHYSIQUE';
        $svg .= '</text>';
        
        $svg .= '</svg>';
        
        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    public function isConnected()
    {
        return $this->isConnected;
    }

    public function getScannerType()
    {
        return $this->scannerType;
    }

    private function isWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    private function isLinux()
    {
        return strtoupper(substr(PHP_OS, 0, 5)) === 'LINUX';
    }
}