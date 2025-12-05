<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge Médecin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        * {
            font-size: 20px;
        }

        .badge {
            height: 101mm;
            width: 65mm;
            border: 3px double #919191;
            background: rgba(73, 242, 248, 0.233);
            padding: 5mm;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }

        .doctor-info {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .doctor-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 6mm;
        }

        .hospital-image {
            width: 50px;
            height: 50px;
            margin-bottom: 6mm;
        }

        .hospital-info {
            font-size: 10px;
            line-height: 12px;
        }

        .name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 3mm;
        }

        .speciality {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .hospital-name {
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .hospital-address {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .contact-info {
            font-size: 12px;
        }

        .header__section {
            position: fixed;
        }

        #watermark {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -2000;
            opacity: 0.2;
        }

        .img__content {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="badge">
        <div id="watermark">
            <img class="img__content" src="{{ asset("assets/uploads/agent-badge.jpg") }}" />
        </div>
        <div class="header__section">
            <img src="{{ asset('assets/uploads/hospital/' . $agent->hospital->img_url) }}" alt="Logo de l'hôpital"
                class="hospital-image">

        </div>
        <br>
        <br>
        <div class="doctor-info">
            <img src="{{ asset('assets/uploads/doctor/' . $agent->img_url) }}" alt="Photo du médecin"
                class="doctor-image">
            <div class="doctor-details">
                <div class="name">{{ $agent->user->name }}</div>
                <div class="speciality">Matricule : {{ $agent->matricule }}</div>
                <div class="speciality">Département : {{ $agent->serviceHospital->service->libelle }}</div>
                <div class="speciality">
                    @if ($agent->typeAgent->libelle == 'Médecin')
                        @if ($agent->type_name == 'specialiste')
                            Spécialité : {{ $agent->typeDoctor->label }}
                        @else
                            Medecin Généraliste
                        @endif
                    @else
                        Sage femme
                    @endif
                </div>
                <div class="contact-info">Tél. : + {{ $agent->contact }}</div>
            </div>
        </div>
        <br>
        <br>
        <div class="hospital-info">

            <div class="hospital-name">{{ $agent->hospital->label }}</div>
            <div class="hospital-address">{{ $agent->hospital->localite }}</div>
            <div class="contact-info">Tél. : +{{ $agent->hospital->contact }}</div>
        </div>
    </div>
</body>

</html>
