<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Etats des recettes du jour</title>
    <style>
        body {
            font-family: Arial, sans-serif;

        }

        * {
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        .container {
            width: 1000px;
            margin: 10px auto;

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

        .section-content-nob p {
            font-size: 16px;
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
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2000;
            opacity: 0.1;
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



        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div id="watermark">
        <img class="img__content" w src="{{ asset('assets/uploads/assurances.jpg') }}" />
    </div>
    <div class="container">
        <div class="header__section">
                <div><img src="{{ asset('assets/uploads/ministere.jpg') }}" alt=""></div>
            <h1>Recettes</h1>
            <div style="position: absolute; top:0; right :0;"><img src="{{ asset('assets/uploads/republique.png') }}"
                    alt=""></div>

        </div>

        <div class="section" style="margin-top: 30px;">
            <div class="section-content-nob">
                
                <p>Caissere : {{ $caissiere->user->name }}</p>
                <p>Date : {{ date('d-m-Y') }}</p>
            </div>
        </div>

        <div class="section" style="margin-top: 30px;">
            <div class="section-content">


                <div>
                    <table>
                        <thead>
                            <tr>
                                <th class="bb-2">N° Matricule</th>
                                <th class="bb-2">Nom & Prénom (s)</th>
                                <th class="bb-2">Nombre de consultation</th>
                                <th class="bb-2">Somme assurance</th>
                                <th class="bb-2">Somme collectée</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td><b>{{ $caissiere->matricule }}</b></td>
                                    <td>
                                        {{ $caissiere->user->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ count($consultation) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $consultation->sum('montant_normal') - $consultation->sum('montant') }} Frs
                                    </td>
                                    <td class="text-center">
                                        {{ $consultation->sum('montant') }} Fr
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <p style="float: right;margin-right : 150px;font-size:16px;">
                        La Caissière :
                    </p>
                    <br>
                    <br>

                    <div style="color: gray;float: right;margin-right : 150px;font-size:16px;">
                        {{ $caissiere->user->name }}
                        {{ $caissiere->user->prenom }}</div>
                </div>
            </div>
        </div>


    </div>



</body>

</html>
