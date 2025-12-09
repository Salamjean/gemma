<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code OTP de connexion</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .logo-icon {
            font-size: 36px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .greeting {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 16px;
            opacity: 0.9;
            font-weight: 400;
        }

        .content {
            padding: 40px 30px;
        }

        .message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            text-align: center;
        }

        .otp-container {
            background: linear-gradient(135deg, #f6f9ff 0%, #f0f4ff 100%);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
            border: 1px solid #e3e8f7;
        }

        .otp-label {
            font-size: 14px;
            color: #667eea;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .otp-code {
            font-size: 42px;
            font-weight: 700;
            color: #2d3748;
            letter-spacing: 8px;
            background: white;
            padding: 15px 25px;
            border-radius: 8px;
            display: inline-block;
            border: 2px dashed #cbd5e0;
            margin: 10px 0;
            font-family: 'Courier New', monospace;
        }

        .timer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #718096;
            font-size: 14px;
            margin-top: 20px;
        }

        .timer-icon {
            font-size: 16px;
        }

        .expiry {
            color: #e53e3e;
            font-weight: 600;
        }

        .instructions {
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            border-left: 4px solid #4299e1;
        }

        .instructions h3 {
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .instructions ul {
            list-style: none;
            padding-left: 0;
        }

        .instructions li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
            color: #4a5568;
        }

        .instructions li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #48bb78;
            font-weight: bold;
        }

        .warning {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
            color: #c53030;
            font-size: 14px;
        }

        .warning-icon {
            font-size: 20px;
            margin-bottom: 10px;
            display: block;
        }

        .button-container {
            text-align: center;
            margin: 30px 0;
        }

        .login-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .footer {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 14px;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-link {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
        }

        .contact-info {
            margin-top: 20px;
            font-size: 13px;
        }

        .contact-info a {
            color: #4299e1;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .header {
                padding: 30px 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .otp-code {
                font-size: 32px;
                letter-spacing: 6px;
                padding: 12px 20px;
            }
            
            .login-button {
                padding: 14px 30px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- En-tête -->
        <div class="header">
            <div class="logo-icon">🏥</div>
            <div class="logo">GEMMA</div>
            <div class="greeting">Bonjour {{ $patientName }},</div>
            <div class="subtitle">Votre code de sécurité pour vous connecter</div>
        </div>

        <!-- Contenu principal -->
        <div class="content">
            <p class="message">
                Utilisez le code à usage unique ci-dessous pour accéder à votre espace patient.
            </p>

            <!-- Code OTP -->
            <div class="otp-container">
                <div class="otp-label">Code de vérification</div>
                <div class="otp-code">{{ $otpCode }}</div>
                <div class="timer">
                    <span class="timer-icon">⏱️</span>
                    <span>Ce code expire dans <span class="expiry">{{ $expiryMinutes }} minutes</span></span>
                </div>
            </div>

            <!-- Instructions -->
            <div class="instructions">
                <h3>Comment utiliser ce code :</h3>
                <ul>
                    <li>Copiez le code ci-dessus</li>
                    <li>Retournez sur la page de connexion</li>
                    <li>Collez ou saisissez le code dans le champ prévu</li>
                    <li>Cliquez sur "Vérifier" pour accéder à votre compte</li>
                </ul>
            </div>

            <!-- Avertissement de sécurité -->
            <div class="warning">
                <span class="warning-icon">⚠️</span>
                <p>
                    <strong>Pour votre sécurité :</strong><br>
                    Ne partagez jamais ce code avec qui que ce soit.<br>
                    L'équipe GEMMA ne vous demandera jamais votre code par téléphone ou email.
                </p>
            </div>
        </div>

        <!-- Pied de page -->
        <div class="footer">
            <div class="social-links">
                <a href="#" class="social-link">Site web</a>
                <a href="#" class="social-link">Support</a>
                <a href="#" class="social-link">Confidentialité</a>
            </div>
            
            <div class="contact-info">
                <p>
                    © {{ $currentYear }} {{ $appName }}. Tous droits réservés.<br>
                    Cet email a été envoyé automatiquement, merci de ne pas y répondre.
                </p>
            </div>
        </div>
    </div>
</body>
</html>