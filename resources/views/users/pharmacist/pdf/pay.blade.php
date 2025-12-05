<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facture </title>
</head>

<body>
    <div>
        <div class="header__section">
            <div><img src="{{ asset('assets/uploads/ministere.jpg') }}" style="width: 100px; height:100px" alt="">
            </div>
            <h1>Facture n° : {{ $payment->id }}</h1>
            <div style="position: absolute; top:0; right :0;"><img src="{{ asset('assets/uploads/republique.png') }}"
                    style="width: 100px; height:100px" alt=""></div>
        </div>

        <div style="margin-top: 30px;">
            <table class="table table-striped table-hover" style="border: none">
                <tbody>
                    <tr>
                        <td><b>N° Dossier Médical : </b></td>
                        <td>{{ $payment->careRequested->admission->patient->code_patient }}</td>
                    </tr>
                    <tr>
                        <td><b>Nom & Prénom(s) : </b></td>
                        <td>{{ $payment->careRequested->admission->patient->user->name }}&nbsp;{{ $payment->careRequested->admission->patient->user->prenom }}
                        </td>
                    </tr>
                     <tr>
                        <td><b>Type de soins :</b></td>
                        <td>{{ $payment->careRequested->admission->prestationHospital->prestationService->libelle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br /><br />
            <div class="section-content">
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach ($payment->careRequested->careNeeds as $item)
                                    <tr>
                                        <th>
                                            @if ($item->injection)
                                                {{ $item->injection->name }} (<span
                                                    class="text-info">{{ $item->total_drug }}</span> FCFA)
                                            @elseif ($item->bandage)
                                                {{ $item->bandage->name }}( <span
                                                    class="text-info">{{ $item->total_drug }}</span> FCFA)
                                            @elseif ($item->care)
                                                {{ $item->care->name }}( <span
                                                    class="text-info">{{ $item->total_drug }}</span> FCFA)
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table >
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Quantité</th>
                                                        <th>
                                                            P. Unitaire (FCFA)
                                                        </th>
                                                        <th>
                                                            P. Total (FCFA)
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->careDrugs as $drug)
                                                        <tr>
                                                            <td>
                                                                {{ $drug->drugHospital->drug->name }}
                                                            </td>
                                                            <td>
                                                                {{ $drug->quantity }}
                                                            </td>
                                                            <td>
                                                                {{ $drug->price }}
                                                            </td>
                                                            <td>
                                                                {{ $drug->total_price }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>
                <br />
                <div>
                    <h4><b>Montant à payer : </b> <span class="badge-price">{{ number_format($payment->price, null, 0, ' ') }}
                            Frs CFA</span></h4>
                    <h4><b>Statut : </b>
                        <span class="badge-status">Medicaments payés</span>
                    </h4>
                </div>
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <div style="float: right;margin-right : 50px;">
                    <p>Fait à {{ $pharmacy->hospital->localite }}. Le {{ date('d/m/Y') }}. </p>
                </div>
                <br />

            </div>
        </div>

        <div class="footer">
            Art. 285. Quiconque se rend coupable de fraude ou de fausse déclaration ou se fait délivrer un des documents
            prévus à l'article précédent, soit en faisant de fausses déclarations, soit en prenant un faux nom ou une
            fausse qualité, soit en fournissant de faux renseignements, certificats ou attestations est puni de deux(02)
            à dix(10) ans et d'une amende de 200.000 à 2.000.000 de francs Franc CFA selon Art 281 et 223
        </div>

</body>

<style>
    body {
        font-family: Arial, sans-serif;
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

    .footer {
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
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 6px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    ul li {
        border: 1px solid #ebf6f4;
        /* Add a thin border to each list item */
        margin-top: -1px;
        /* Prevent double borders */
        background-color: #fbfffe;
        /* Add a grey background color */
        padding: 12px;
        /* Add some padding */
    }

    .badge-price {
        background-color: rgb(37, 128, 254);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-name {
        background-color: rgb(224, 63, 141);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-status {
        background-color: rgb(7, 241, 225);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-encours {
        background-color: rgb(255, 120, 24);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }
</style>
