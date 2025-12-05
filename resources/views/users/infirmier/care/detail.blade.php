@extends('layouts.dashboard', ['title' => 'Details'])


@section('content')
    <div class="container">
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
                                                    style="color:red;">{{ $care->admission->patient->code_patient }}</span></span></label>
                                    </div>
                                    <div class="d-flex items-center pb-1">

                                        <span class=" d-flex mt-1 text-success">
                                            <span>Paiement du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                        </span>

                                    </div>
                                </div>
                                <hr>
                                @php
                                    $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $care->admission->patient->birth_date);
                                    $age = $agePatient->diffInYears(Carbon\Carbon::now());
                                @endphp
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $care->admission->patient->user->name }} {{ $care->admission->patient->user->prenom }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                        <input type="text" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ $care->admission->patient->birth_date }}" disabled>
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
                                            value="{{ $care->admission->patient->gender }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label"><b>Contact</b></label>
                                    <input type="text" class="form-control"
                                        value="{{ $care->admission->patient->telephone }}" readonly />
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label"><b>Motif de la consultation</b></label>
                                    <textarea type="text" rows="1" class="form-control" name="motif_consultation" id="motif_consultation"
                                        value="{{ $care->admission->motif_consultation }}" readonly>{{ $care->admission->motif_consultation }}</textarea>
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
                            @if ($care->status == 'payment_pending')
                                <div class=" " style="font-size: 15px;">Demande <span class="text-primary">
                                        à la pharmacie</span>
                                </div>
                            @elseif ($care->status == 'success')
                                @if (count($care->consultation->ordonnances) > 0)
                                    <a href="{{ url("consultation/post/imprimer/ordonnance/" . $care->consultation->ordonnances[0]->id) }}" class="btn btn-danger">
                                    Ordonnance
                                </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Type de soins</th>
                                        <td class=" fs-5">
                                            {{ $care->admission->prestationHospital->prestationService->libelle }}
                                        </td>
                                    </tr>
                                    @foreach ($care->careNeeds as $item)
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
                                        <th>Montant à payer</th>
                                        <td class="text-info fw-bold fs-4 text-end">
                                            {{ number_format($care->price, null, 0, ' ') }} FCFA
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($care->status == 'success')
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="row">

                        <label for="justification" class="form-label fs-2"> <br>Vos observations : </b><span
                                class="danger"></span>
                        </label>
                        <div class="input-group">
                            {{ $care->consultation->observation_infirmiere }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection
