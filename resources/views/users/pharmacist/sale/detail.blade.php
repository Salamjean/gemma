@extends('layouts.dashboard', ['title' => 'Paiement | En attente'])

@section('content')
    <div class="container">
        @if ($payment->type == 'care_requested')
            <div class="box bb-3 pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
                <div class="row">

                    <div class="col-md-12">
                        <div class="px-2">
                            <div class="px-5 bg-color">
                                <div class="row">
                                    <div class="d-flex justify-content-between mt-10">
                                        <div class="">
                                            <label class="form-label">N° Dossier médical | <span class="fw-bold fs-18"><span
                                                        id="dm_patient"
                                                        style="color:red;">{{ $payment->careRequested->admission->patient->code_patient }}</span></span></label>
                                        </div>
                                        <div class="d-flex items-center pb-1">

                                            <span class=" d-flex mt-1 text-success">
                                                <span>Paiement du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                            </span>

                                        </div>
                                    </div>
                                    <hr>
                                    @php
                                        $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $payment->careRequested->admission->patient->birth_date);
                                        $age = $agePatient->diffInYears(Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $payment->careRequested->admission->patient->user->name }} {{ $payment->careRequested->admission->patient->user->prenom }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date"
                                                value="{{ $payment->careRequested->admission->patient->birth_date }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="age" class="form-label"> <b>Age </b></label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                value="{{ $age }} ans" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="gender" class="form-label"> <b>Sexe </b></label>
                                            <input type="text" class="form-control" id="gender" name="gender"
                                                value="{{ $payment->careRequested->admission->patient->gender }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label"><b>Contact</b></label>
                                        <input type="text" class="form-control"
                                            value="{{ $payment->careRequested->admission->patient->telephone }}" readonly />
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label"><b>Motif de la consultation</b></label>
                                        <textarea type="text" rows="1" class="form-control" name="motif_consultation" id="motif_consultation"
                                            value="{{ $payment->careRequested->admission->motif_consultation }}" readonly>{{ $payment->careRequested->admission->motif_consultation }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-xs-12 d-flex justify-content-between">
                                <div class="badge badge-warning" style="font-size: 15px;">PRODUITS A FOURNIR</div>
                                <div class=" " style="font-size: 15px;">Infirmier(e) ayant fait la requête : <span class="text-primary">
                                        {{ $payment->careRequested->admission->infirmier->user->name . ' ' . $payment->careRequested->admission->infirmier->user->prenom }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Type de soins</th>
                                            <td class=" fs-5">
                                                {{ $payment->careRequested->admission->prestationHospital->prestationService->libelle }}
                                            </td>
                                        </tr>
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
                                                <td>
                                                    <table class="table table-bordered table-striped ">
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

                                        <tr>
                                            <th>Montant payé</th>
                                            <td class="text-info fw-bold fs-4 text-end">
                                                {{ number_format($payment->price, null, 0, ' ') }} FCFA
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @elseif ($payment->type == 'ordonnance')
            <div class="box bb-3 pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
                <div class="row">

                    <div class="col-md-12">
                        <div class="px-2">
                            <div class="px-5 bg-color">
                                <div class="row">
                                    <div class="d-flex justify-content-between mt-10">
                                        <div class="">
                                            <label class="form-label">N° Dossier médical | <span class="fw-bold fs-18"><span
                                                        id="dm_patient"
                                                        style="color:red;">{{ $payment->ordonnance->consultation->patient->code_patient }}</span></span></label>
                                        </div>
                                        <div class="d-flex items-center pb-1">

                                            <span class=" d-flex mt-1 text-success">
                                                <span>Paiement du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                            </span>

                                        </div>
                                    </div>
                                    <hr>
                                    @php
                                        $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $payment->ordonnance->consultation->patient->birth_date);
                                        $age = $agePatient->diffInYears(Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $payment->ordonnance->consultation->patient->user->name }} {{ $payment->ordonnance->consultation->patient->user->prenom }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date"
                                                value="{{ $payment->ordonnance->consultation->patient->birth_date }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="age" class="form-label"> <b>Age </b></label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                value="{{ $age }} ans" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="gender" class="form-label"> <b>Sexe </b></label>
                                            <input type="text" class="form-control" id="gender" name="gender"
                                                value="{{ $payment->ordonnance->consultation->patient->gender }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label"><b>Contact</b></label>
                                        <input type="text" class="form-control"
                                            value="{{ $payment->ordonnance->consultation->patient->telephone }}"
                                            readonly />
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label"><b>Motif de la consultation</b></label>
                                        <textarea type="text" rows="1" class="form-control" name="motif_consultation" id="motif_consultation"
                                            value="{{ $payment->ordonnance->consultation->admission->motif_consultation }}" readonly>{{ $payment->ordonnance->consultation->admission->motif_consultation }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-xs-12 d-flex justify-content-between">
                                <div class="badge badge-warning" style="font-size: 15px;">PRODUITS A FOURNIR</div>
                                <div class=" " style="font-size: 15px;">Demande de <span class="text-primary">
                                        {{ $payment->ordonnance->consultation->doctor->user->name . ' ' . $payment->ordonnance->consultation->doctor->user->prenom }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
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
                                        @foreach ($payment->ordonnance->prescriptions as $prescription)
                                            <tr>
                                                <td>{{ $prescription->drugHospital->drug->name }}</td>
                                                <td>{{ $prescription->quantity }}</td>
                                                <td>{{ $prescription->drugHospital->price . ' FCFA' ?? '' }}</td>
                                                <td>{{ $prescription->drugHospital->price ? $prescription->drugHospital->price * intval($prescription->quantity) . ' FCFA' : '' }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <th>Montant à payer</th>
                                            <td colspan="3" class="text-info fw-bold fs-4 text-end">
                                                {{ number_format($payment->price, null, 0, ' ') }} FCFA
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($payment->type == 'hospitalisation')
            <div class="box bb-3 pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
                <div class="row">

                    <div class="col-md-12">
                        <div class="px-2">
                            <div class="px-5 bg-color">
                                <div class="row">
                                    <div class="d-flex justify-content-between mt-10">
                                        <div class="">
                                            <label class="form-label">N° Dossier médical | <span
                                                    class="fw-bold fs-18"><span id="dm_patient"
                                                        style="color:red;">{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->code_patient }}</span></span></label>
                                        </div>
                                        <div class="d-flex items-center pb-1">

                                            <span class=" d-flex mt-1 text-success">
                                                <span>Paiement du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                            </span>

                                        </div>
                                    </div>
                                    <hr>
                                    @php
                                        $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->birth_date);
                                        $age = $agePatient->diffInYears(Carbon\Carbon::now());
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->user->name }} {{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->user->prenom }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date"
                                                value="{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->birth_date }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="age" class="form-label"> <b>Age </b></label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                value="{{ $age }} ans" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="gender" class="form-label"> <b>Sexe </b></label>
                                            <input type="text" class="form-control" id="gender" name="gender"
                                                value="{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->gender }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label"><b>Contact</b></label>
                                        <input type="text" class="form-control"
                                            value="{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->patient->telephone }}"
                                            readonly />
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label"><b>Motif de la consultation</b></label>
                                        <textarea type="text" rows="1" class="form-control" name="motif_consultation" id="motif_consultation"
                                            value="{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->admission->motif_consultation }}"
                                            readonly>{{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->admission->motif_consultation }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-xs-12 d-flex justify-content-between">
                                <div class="badge badge-warning" style="font-size: 15px;">PRODUITS A FOURNIR</div>
                                <div class=" " style="font-size: 15px;">Demande de <span class="text-primary">
                                        {{ $payment->hospitalisationDrugRequested->hospitalisation->consultation->doctor->user->name . ' ' . $payment->hospitalisationDrugRequested->hospitalisation->consultation->doctor->user->prenom }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
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
                                        @foreach ($payment->hospitalisationDrugRequested->therapeutiqueProtocols as $prescription)
                                            <tr>
                                                <td>{{ $prescription->drugHospital->drug->name }}</td>
                                                <td>{{ $prescription->quantity }}</td>
                                                <td>{{ $prescription->drugHospital->price . ' FCFA' ?? '' }}</td>
                                                <td>{{ $prescription->drugHospital->price ? $prescription->drugHospital->price * intval($prescription->quantity) . ' FCFA' : '' }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <th>Montant à payer</th>
                                            <td colspan="3" class="text-info fw-bold fs-4 text-end">
                                                {{ number_format($payment->price, null, 0, ' ') }} FCFA
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
