@extends('layouts.dashboard', ['title' => 'Détails du patient n° ' . $patient->code_patient])

@section('content')
    <div class="">
        <div class="container-full">

            <section class="content">

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="box box-widget widget-user" style="position: relative;">
                            <div style="position: absolute; right:10px; top:10px; color:white; z-index:1;">
                                <div style="display: flex; flex-direction:row; justify-content:end; align-content:center; gap:5px;">
                                    <div>
                                        <a href="{{ route('doctor.patient.dossier_medical', $patient->id)}}" class="btn az__link text-white" style="background-color: rgba(255, 255, 128, .2);">
                                            Dossier médical
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-user-header bbsr-0 bber-0" data-overlay="5" style="background: linear-gradient(#6E4405, #AF9ECA);">
                                <h3 class="widget-user-username text-white">
                                    {{ $patient->user->name }} {{ $patient->user->prenom }}
                                </h3>
                                <h6 class="widget-user-desc text-white"></h6>
                            </div>
                            <div style="position: absolute; border-radius:100%; background-color:white; top:13%; left:2%;">
                                @if ($patient->img_url != null)
                                    <img src="{{ asset('assets/uploads/patient/' . $patient->img_url) }}" width="120px" height="120px"
                                        class="rounded-circle" alt="Photo de profil" />
                                @elseif ($patient->gender == 'masculin')
                                    <img src="{{ asset('assets/images/avatar/6.png') }}" class="rounded-circle"
                                        alt="Photo de profil" />
                                @elseif($patient->gender == 'feminin')
                                    <img src="{{ asset('assets/images/avatar/2.png') }}" class="rounded-circle"
                                        alt="Photo de profil" />
                                @endif
                            </div>
                            <div class="box-footer" style="padding-top: 100px;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Code du dossier médical</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->code_patient }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Date de création du compte</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->created_at->format('d/m/Y - H:i:s') }}
                                                @if ($patient->mere_id)
                                                    <a href="{{ route('hospital.patient.detail', $patient->mere_id) }}"> (
                                                        Enfant du patient {{ $patient->mere->user->name }}
                                                        {{ $patient->mere->user->prenom }} ) </a>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Nom du patient</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->user->name }} {{ $patient->user->prenom }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Genre</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->gender }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Profession</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->profession }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Contact 1</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->telephone }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Contact 2</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->contact2 }}
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Date de naissance</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->birth_date }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="declaration-header-title">Age</div>
                                        <div class="decalration-header">
                                            <h5 class="declaration-header-description">
                                                {{ \Carbon\Carbon::createFromFormat('d/m/Y', $patient->birth_date)->diffInYears(\Carbon\Carbon::now()) }}
                                                ans
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Lieu de naissance</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->birthPlace->name }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Pays de naissance</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->country }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title"></div>
                                            <h5 class="declaration-header-description">
                                                <div class="declaration-header-title">Residence habituelle</div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->habitualResidence->name }}
                                                </h5>

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Residence actuelle</div>
                                            <h5 class="declaration-header-description">

                                                {{ $patient->currentResidence->name }}
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Assurer</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->assurer ? 'Oui' : 'Non' }}
                                            </h5>
                                        </div>
                                    </div>
                                    @if ($patient->assurer)
                                        <div class="col-sm-6">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Numéro d'assurance</div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->no_assurance }}
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Type de pièce</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->type_piece }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Numéro de pièce</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->numero_identite }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Contact</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->telephone }}
                                            </h5>
                                        </div>
                                    </div>
                                    @if ($patient->contact2)
                                        <div class="col-sm-6">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Contact:</div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->contact2 }}
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Personne à contacter en cas d'urgence
                                            </div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->nom_personne_cas_urgence }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Numéro personne à contacter en cas
                                                d'urgence</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->telephone_personne_cas_urgence }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="decalration-header">
                                            <div class="declaration-header-title">Lien de la personne</div>
                                            <h5 class="declaration-header-description">
                                                {{ $patient->lien_personne_cas_urgence }}
                                            </h5>
                                        </div>
                                    </div>
                                    @if ($patient->nom_personne2_cas_urgence)
                                        <div class="col-sm-6">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Personne à contacter en cas d'urgence
                                                    n°2
                                                </div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->nom_personne2_cas_urgence }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Numéro personne à contacter en cas
                                                    n°2 d'urgence</div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->telephone_personne2_cas_urgence }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Lien de la personne n°2</div>
                                                <h5 class="declaration-header-description">
                                                    {{ $patient->lien_personne2_cas_urgence }}
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($patient->gender == 'feminin')
                                        <div class="col-sm-12">
                                            <div class="decalration-header">
                                                <div class="declaration-header-title">Enfants</div>
                                                <h5 class="declaration-header-description">
                                                    @foreach ($patient->enfantsPatient as $item)
                                                        <span style="margin-right: 10px;">
                                                            <a href="{{ route('hospital.patient.detail', $item->naissance->enfant->id) }}">
                                                                {{ $item->naissance->enfant->code_patient }},
                                                            </a>
                                                        </span>
                                                    @endforeach
                                                </h5>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <style>

        .decalration-header {
            margin-bottom: 10px;
        }

        .declaration-header-title {
            font-weight: bold;
            font-size: 17px;
        }

        .declaration-header-description {
            font-size: 16px;
            font-style: italic;
        }

        .declaration-header-description-12 {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-style: italic;
        }

        .az__link:hover{
            color: white !important;
        }
    </style>
@endsection
