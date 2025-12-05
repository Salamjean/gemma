<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            padding: 20px 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        .contact-details {
            background-color: #f7f7f7;
            padding: 10px;
            border-radius: 5px;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Prise de contact sur Gemma</h2>
        <div class="contact-details">
            <ul>
                <li><strong>Nom</strong> : {{ $contact['first_name'] }}</li>
                <li><strong>Prénom</strong> : {{ $contact['last_name'] }}</li>
                <li><strong>Email</strong> : {{ $contact['email'] }}</li>
                <li><strong>Téléphone</strong> : {{ $contact['telephone'] }}</li>
            </ul>
        </div>
        <p class="message"><strong>Message</strong> :
            {{ $contact['message'] }}
        </p>
    </div>
</body>

</html>
