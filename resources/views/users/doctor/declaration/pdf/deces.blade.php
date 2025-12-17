<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Certificat médical de décès</title>
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
            top: 250px;
            left: 30px;
            width: 100%;
            height: 100%;
            z-index: -2000;
            opacity: 0.3;
        }

        .img__content {
            width: 100%;
            height: 40%
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
        <img class="img__content" w src="{{ public_path('assets/uploads/deces.jpg') }}" />
    </div>
    <footer>
        Art. 285. Quiconque se rend coupable de fraude ou de fausse déclaration ou se fait délivrer un des documents
        prévus à l'article précédent, soit en faisant de fausses déclarations, soit en prenant un faux nom ou une fausse
        qualité, soit en fournissant de faux renseignements, certificats ou attestations est puni de deux(02) à dix(10)
        ans et d'une amende de 200.000 à 2.000.000 de francs Franc CFA selon Art 281 et 223
    </footer>
    <div class="container">
        <div class="header__section">
            <div><img src="{{ public_path('assets/uploads/ministere.jpg') }}" alt=""></div>
            <h1>Certificat médical de décès</h1>
            <div style="position: absolute; top:0; right :0;"><img
                    src="{{ public_path('assets/uploads/republique.png') }}" alt=""></div>

        </div>

        <div class="section" style="margin-top: 30px;">
            <div class="section-content-nob">
                <p>Formation Sanitaire : {{ $declaration->hospital->label }}</p>
                <p>Ville/Commune de Décès : {{ $declaration->hospital->localiteH->name }}</p>
                <p>Date : {{ Carbon\Carbon::parse($declaration->created_at)->format('d-m-Y') }}</p>
                <p>Numéro de Déclaration : {{ $declaration->reference }}</p>
            </div>
        </div>

        <div class="section" style="margin-top: 30px;">
            <div class="section-content">
                <p class="content" style="margin-top: 20px;">Le {{ dateFr($declaration->created_at) }} à
                    {{ heureFr($declaration->created_at) }} - {{ $declaration->hospital->label }}
                </p>
                @if ($declaration->deces->person == 'patient')
                    <p class="content" style="margin-top: 20px;">

                        @if ($declaration->patient->gender == 'masculin')
                            est décédé :
                        @else
                            est décédée :
                        @endif
                        {{ $declaration->patient->user->name }} {{ $declaration->patient->user->prenom }}
                        née le {{ $declaration->patient->birth_date }} à
                        {{ $declaration->patient->birthPlace->name }},


                    </p>
                    <p class="content" style="margin-top: 20px;">
                        Numéro de dossier médical : {{ $declaration->patient->code_patient }}
                    </p>
                    <p class="content" style="margin-top: 20px;">
                        Circonstance du décès :
                        @if ($declaration->deces->deces_maternel == 'oui')
                            Accouchement Difficile
                        @else
                            {{ $declaration->deces->cause_initiale }}
                        @endif
                    </p>
                @else
                    @if ($declaration->deces->genre == 'masculin')
                        est décédé le nouveau née de :
                    @else
                        est décédée le nouveau née de :
                    @endif
                    {{ $declaration->patient->user->name }} {{ $declaration->patient->user->prenom }}
                    née le {{ $declaration->patient->birth_date }} à {{ $declaration->patient->birthPlace->name }},

                @endif

                <p class="content" style="margin-top: 20px;">
                    <br>
                    Medecin déclarant(e) : {{ $declaration->doctor->user->name }}
                    {{ $declaration->doctor->user->prenom }}
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
                        {{ $declaration->doctor->user->prenom }}
                    </div>
                </div>
            </div>
        </div>


    </div>



</body>

</html>