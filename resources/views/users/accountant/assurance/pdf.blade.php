<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Assurances</title>
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
        .footer {
            position: fixed;
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 50px;
            color: gray;
            text-align: center;
            font-size: 14px;
            line-height: 20px;
        }
        .hr{
            opacity: 0.6;
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div id="watermark">
        <img class="img__content" w src="{{ asset('assets/uploads/assurances.jpg') }}" />
    </div>
    <div class="container">
        <div class="header__section">
                @if ($comptable->hospital->img_url != null)
            <img src="{{ asset('assets/uploads/hospital/' . $comptable->hospital->img_url) }}" alt="hôpital" width="100">
                @else
                <div><img src="{{ asset('assets/uploads/ministere.jpg') }}" alt=""></div>
                @endif
            <div class="section" style="margin-top: 30px;">
                <div class="section-content-nob">
                    <p>Hôpital : {{ $comptable->hospital->label }}</p>
                    <p>Date : {{ date('d-m-Y') }} à {{ heureFr(Carbon\Carbon::now()) }}</p>
                </div>
            </div></br></br>
            <h1>Assurances</h1>
            <div style="position: absolute; top:0; right :0;"><img src="{{ asset('assets/uploads/republique.png') }}"
                    alt=""></div>
        </div>
        <div class="section" style="margin-top: 30px;">
            <div class="section-content">
                @php
                    $somConsultation = 0;
                    $somNormal = 0;
                    foreach ($data as $key => $index) {
                        $somConsultation += $index->admission->montant;
                        $somNormal += $index->admission->montant_normal;
                    }
                @endphp
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Patient</th>
                                <th>N° Assurance</th>
                                <th>Motif consultation</th>
                                <th>Montant consultation</th>
                                <th>Pourcentage</th>
                                <th>Montant patient</th>
                                <th>Montant assurance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $result)
                                <tr>
                                    <td>{{ dateNumberFr($result->date) }} </td>
                                    <td>{{ $result->typeAssurance->libelle ?? null }}</td>
                                    <td>{{ $result->admission->patient->user->name }} {{ $result->admission->patient->user->prenom }}</td>
                                    <td>{{ $result->admission->no_assurance }}</td>
                                    <td>{{ $result->admission->type_admission }}</td>
                                    <td>{{ $result->admission->montant_normal }} FCFA</td>
                                    <td>{{ $result->percent * 100 }}%</td>
                                    <td>{{ $result->admission->montant }} FCFA</td>
                                    <td>{{ $result->prix }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="box-body" style="margin-bottom: 10px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <span style="font-size: 18px; font-weight:bold">
                            Total Assurance : <span style="color:#f89a20; font-weight:bold; font-size: 18px">{{ $data->sum('prix') }} FCFA </span> |
                        </span>
                        <span style="font-size: 18px; font-weight:bold">
                            Total Consultation : <span style="color:#2048F8; font-weight:bold; font-size: 18px">{{ $somConsultation }} FCFA  </span>|
                        </span>
                        <span style="font-size: 18px; font-weight:bold">
                            Montant normal : <span style="color:#F82097; font-weight:bold; font-size: 18px">{{ $somNormal }} FCFA</span>
                        </span>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <p style="float: right;margin-right : 150px;font-size:16px;">
                        Le comptable :
                    </p>
                    <br>
                    <br>

                    <div style="color: gray;float: right;margin-right : 150px;font-size:16px;">
                        {{ $comptable->user->name }}
                        {{ $comptable->user->prenom }}</div>
                </div>
                
            </div>
        </div>
        
        <div class="footer">
            <hr class="hr"/>
            <p>
                Art. 285.  Quiconque se rend coupable de fraude ou de fausse déclaration ou se fait délivrer un des documents prévus à l'article précédent, soit en faisant de fausses déclarations, soit en prenant un faux nom ou une fausse qualité, soit en fournissant de faux renseignements, certificats ou attestations est puni de deux(02) à dix(10) ans et d'une amende de 200.000 à 2.000.000 de francs Franc CFA selon Art 281 et 223
            </p>
        </div>
    </div>
</body>

</html>
