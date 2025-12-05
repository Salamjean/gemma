<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Certificat médical de naissance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 700px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 10px;
        }

        .section-content {
            padding: 10px;
        }

        .section-content p {
            margin: 0;
        }

        .header__section {
            position: relative;
        }

        img {
            width: 100px;
        }

        h1 {
            text-transform: uppercase;
            font-size: 28px;
        }

        #watermark {
            position: fixed;
            top: 150px;
            left: 30px;
            width: 100%;
            height: 100%;
            z-index: -2000;
            opacity: 0.3;
        }

        .img__content {
            width: 100%;
            height: 60%
        }

        footer {
            position: fixed;
            bottom: 2px;
            left: 0px;
            right: 0px;
            height: 50px;
            color: gray;
            text-align: center;
            font-size: 14px;
            line-height: 20px;
        }

        .content {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div id="watermark">
        <img class="img__content" src="{{ asset('assets/uploads/femme.jpg') }}" />
    </div>
    <footer>
        Art. 285. Quiconque se rend coupable de fraude ou de fausse déclaration ou se fait délivrer un des documents
        prévus à l'article précédent, soit en faisant de fausses déclarations, soit en prenant un faux nom ou une fausse
        qualité, soit en fournissant de faux renseignements, certificats ou attestations est puni de deux(02) à dix(10)
        ans et d'une amende de 200.000 à 2.000.000 de francs Franc CFA selon Art 281 et 223
    </footer>

        <div class="container">
            <div class="header__section">
                <div><img src="{{ asset('assets/uploads/ministere.jpg') }}" alt=""></div>
                <h1>Certificat médical de naissance</h1>
                <div style="position: absolute; top:0; right :0;"><img src="{{ asset('assets/uploads/republique.png') }}"
                        alt=""></div>

            </div>

            <div class="section" style="margin-top: 30px;">
                <div class="section-content-nob">
                    <p>Formation Sanitaire : {{ $declaration->hospital->label }}</p>
                    <p>Ville/Commune de Naissance : {{ $declaration->hospital->localiteH->name }}</p>
                    <p>Date : {{ Carbon\Carbon::parse($declaration->created_at)->format('d-m-Y') }}</p>
                    <p>Numéro de Déclaration : {{ $declaration->reference }}</p>
                </div>
            </div>

            <div class="section" style="margin-top: 30px;">
                <div class="section-content">
                    <p class="content" style="margin-top: 20px;">Je soussigné(e)
                        <span style="font-size: 18px; font-style:italic; color:rgb(9, 16, 24);">{{ $declaration->doctor->user->name }}
                            {{ $declaration->doctor->user->prenom }}</span>, </p>
                    <p class="content" style="margin-top: 20px;">certifie que Mme :
                        <span style="font-size: 18px; font-style:italic; color:rgb(9, 16, 24);">{{ $declaration->patient->user->name }}
                            {{ $declaration->patient->user->prenom }}</span>, numéro de dossier médical : {{ $declaration->patient->code_patient }}
                        </p>
                    <p class="content" style="margin-top: 20px;">
                        a accouché dans notre établissement sanitaire le :
                        <span style="font-size: 18px; font-style:italic; color:rgb(9, 16, 24);">{{ Carbon\Carbon::parse($declaration->date)->format('d-m-Y') }}</span>
                        à <span style="font-size: 18px; font-style:italic; color:rgb(9, 16, 24);">{{ Carbon\Carbon::parse($declaration->heure)->format('H:i') }}</span>,
                    </p>
                    <p class="content" style="margin-top: 20px;">
                        @if ($declaration->naissance->nombre == 1)
                            De {{ $declaration->naissance->nombre }} enfant {{ $declaration->naissance->nee }}, de sexe {{ $declaration->naissance->genre }}.
                        @else
                            De {{ $declaration->naissance->nombre }} enfants qui sont du genre de sexe {{ $declaration->naissance->genre }}. Etat des enfants : {{ $declaration->naissance->nee }}.
                        @endif
                    </p>
                    <br>
                    <br>
                    <br>
                    <div>
                        <p style="float: right;margin-right : 50px;">
                            Fait à {{ $declaration->hospital->localite }} . Le {{ date('d-m-Y') }}.
                        </p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div>
                        <p style="float: right;margin-right : 150px;">
                            @if ($declaration->doctor->typeAgent->libelle == 'Médecin')
                                Le Médecin :
                            @elseif ($declaration->doctor->typeAgent->libelle == 'Sage femme')
                                La sage femme :
                            @elseif ($declaration->doctor->typeAgent->libelle == 'Infirmier')
                                L'infirmier' :
                            @endif

                        </p>
                        <br>
                        <br>

                        <div style="color: gray;float: right;margin-right : 150px;">
                            {{ $declaration->doctor->user->name }}
                            {{ $declaration->doctor->user->prenom }}</div>
                    </div>
                </div>
            </div>


        </div>



</body>

</html>
