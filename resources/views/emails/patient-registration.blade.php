<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation d'inscription Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 30px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .code-box {
            background-color: #e3f2fd;
            border: 2px dashed #2196F3;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
            border-radius: 5px;
        }
        .code-patient {
            font-size: 24px;
            font-weight: bold;
            color: #2196F3;
            letter-spacing: 2px;
            margin: 10px 0;
        }
        .credentials {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .info-box {
            background-color: #e8f5e9;
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .important-note {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue sur GEMMA</h1>
        <p>Inscription patient confirmée</p>
    </div>
    
    <div class="content">
        <p>Bonjour <strong>{{ $user->name }} {{ $user->prenom }}</strong>,</p>
        
        <p>Votre inscription en tant que patient sur la plateforme GEMMA a été effectuée avec succès.</p>
        
        <div class="code-box">
            <h3>Votre Code Patient :</h3>
            <div class="code-patient">{{ $codePatient }}</div>
            <p>Ce code est unique et vous sera demandé pour toutes vos consultations.</p>
        </div>
        
        <div class="important-note">
            <p><strong>⚠️ Important :</strong> Conservez précieusement ce code. Il vous permettra de :</p>
            <ul>
                <li>Accéder à votre dossier médical</li>
                <li>Prendre des rendez-vous</li>
                <li>Consulter vos résultats d'analyses</li>
                <li>Suivre votre historique médical</li>
            </ul>
        </div>
        
        @if($user->email)
        <div class="credentials">
            <h3>Vos identifiants de connexion :</h3>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><small>Pour des raisons de sécurité, nous vous recommandons de changer votre mot de passe après votre première connexion.</small></p>
        </div>
        @endif
        
        <div class="info-box">
            <h3>Informations personnelles :</h3>
            <p><strong>Nom complet :</strong> {{ $user->name }} {{ $user->prenom }}</p>
            <p><strong>Téléphone :</strong> {{ $patient->telephone }}</p>
            <p><strong>Date de naissance :</strong> {{ date('d/m/Y', strtotime($patient->birth_date)) }}</p>
            @if($patient->numero_identite)
            <p><strong>Numéro d'identité :</strong> {{ $patient->numero_identite }}</p>
            @endif
        </div>
        
        <p>Vous pouvez maintenant utiliser votre code patient pour :</p>
        <ul>
            <li>Prendre rendez-vous en ligne</li>
            <li>Consulter votre dossier médical</li>
            <li>Accéder à vos ordonnances</li>
            <li>Recevoir vos résultats d'examens</li>
        </ul>
        
        <p style="margin-top: 30px;">
            {{-- <a href="{{ url('https://patient.gemma-ci.com/login') }}" style="background-color: #2196F3; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;"> --}}
            <a href="{{ url('http://localhost:3000/login') }}" style="background-color: #2196F3; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
                Accéder à mon espace patient
            </a>
        </p>
        
        <p>Pour toute assistance, contactez le service patient de votre établissement de santé.</p>
        
        <div class="important-note">
            <p><strong>Confidentialité :</strong> Votre code patient est confidentiel. Ne le partagez avec personne.</p>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; {{ $currentYear }} GEMMA - Gestion Électronique des Dossiers Médicaux</p>
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
    </div>
</body>
</html>