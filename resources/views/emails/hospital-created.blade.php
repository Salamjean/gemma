<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirmation de création de compte</title>
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
            background-color: #4CAF50;
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
        .credentials {
            background-color: #e8f5e9;
            padding: 15px;
            border-left: 4px solid #4CAF50;
            margin: 20px 0;
        }
        .info-box {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue sur GEMMA</h1>
        <p>Compte hôpital créé avec succès</p>
    </div>
    
    <div class="content">
        <p>Bonjour <strong>{{ $user->name }} {{ $user->prenom }}</strong>,</p>
        
        <p>Votre compte hôpital a été créé avec succès sur la plateforme GEMMA.</p>
        
        <div class="credentials">
            <h3>Vos identifiants de connexion :</h3>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Mot de passe :</strong> {{ $password }}</p>
            <p><small>Nous vous recommandons de changer votre mot de passe après votre première connexion.</small></p>
        </div>
        
        <div class="info-box">
            <h3>Informations de l'hôpital :</h3>
            <p><strong>Nom :</strong> {{ $hospital->label }}</p>
            <p><strong>Référence :</strong> {{ $hospital->reference }}</p>
            <p><strong>Contact :</strong> {{ $hospital->contact }}</p>
            <p><strong>Localité :</strong> {{ $hospital->localite }}</p>
            <p><strong>District sanitaire :</strong> {{ $hospital->district_sanitaire }}</p>
        </div>
        
        <p>Vous pouvez maintenant vous connecter à la plateforme pour gérer vos services.</p>
        
        <p style="margin-top: 30px;">
            <a href="{{ url('/login') }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
                Se connecter à GEMMA
            </a>
        </p>
        
        <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
    </div>
    
    <div class="footer">
        <p>&copy; {{ $currentYear }} GEMMA - Tous droits réservés</p>
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
    </div>
</body>
</html>