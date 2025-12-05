<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point du jour</title>

</head>


<body>

    <footer>
        Art. 285. Quiconque se rend coupable de fraude ou de fausse déclaration ou se fait délivrer un des documents
        prévus à l'article précédent, soit en faisant de fausses déclarations, soit en prenant un faux nom ou une fausse
        qualité, soit en fournissant de faux renseignements, certificats ou attestations est puni de deux(02) à dix(10)
        ans et d'une amende de 200.000 à 2.000.000 de francs Franc CFA selon Art 281 et 223
    </footer>
    <div class="container">
        <div class="hospital-info">
            @if ($pharmacy->hospital->img_url != null)
                <img src="{{ asset('assets/uploads/hospital/' . $pharmacy->hospital->img_url) }}" alt="hôpital"
                    width="100">
            @else
            @endif
            <h3>{{ $pharmacy->hospital->label }}</h3>
            <p>Adresse: {{ $pharmacy->hospital->localite }}</p>
            <p>Tel: {{ $pharmacy->hospital->contact }}</p>
            <p style=""> Date d’édition : {{ dateCompletFr(date('Y-m-d')) }} </p>
        </div>
        <div class="ministry-logo">
            <img src="{{ asset('assets/uploads/republique.png') }}"alt="">
        </div>
        <div style="clear: both;"></div>

        <div class="header">
            <h1>Point du jour</h1>
        </div>

        <div class="prescriptions">
            <h2>Total : {{ number_format($payments->sum('price'), null, 0, ' ') }} FCFA</h2>
            <table class="prescription-table">
                <thead>
                    <tr>
                        <th class="bb-2">Code Patient</th>
                        <th class="bb-2">Type</th>
                        <th class="bb-2">Motif</th>
                        <th class="bb-2">Montant</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse ($payments as $item)
                        <tr>
                            <td><b>{{ $item->careRequested->admission->patient->code_patient }}</b></td>
                            <td>{{ grudSaleType($item->type) }}</td>
                            <td>
                                {{ $item->careRequested->admission->prestationHospital->prestationService->libelle }}
                            </td>
                            <td>
                                <i>{{ number_format($item->price, null, 0, ' ') }} FCFA</i>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            vide...
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
        <div class="pharmacy-signature">

                <p><strong>{{ $pharmacy->user->name }}
                        {{ $pharmacy->user->prenom }}</strong></p>
                <p>Pharmacien</p>
        </div>

    </div>

    <style>


        .img__content {
            width: 90%;
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

        .hospital-info {
            float: left;
            width: 50%;
            text-align: left;
        }

        .ministry-logo {
            float: right;
            width: 50%;
            text-align: right;
        }

        .header {
            text-align: center;
            text-decoration: underline;
        }

        .ministry-logo img {
            max-width: 100px;
        }

        .prescriptions {
            margin-top: 30px;
            width: 100%;
        }

        .prescription-table {
            width: 100%;
            border-collapse: collapse;
        }

        .prescription-table th,
        .prescription-table td {
            text-align: left;
            padding: 5px;
        }

        .patient-name {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .pharmacy-signature {
            margin-top: 150px;
            text-align: right;
        }
    </style>
</body>

</html>
