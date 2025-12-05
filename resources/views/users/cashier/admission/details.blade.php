@extends('layouts.dashboard', ['title' => 'Détail Admission'])

@section('content')
    @if (auth()->user()->role_as == 'cashier')
        <!-- Main content -->
        <section class="content">

            <div class="row clearfix">

                <div class="col-lg-4 col-md-12">
                    <div class="box profile-header">
                        <div class="box-body text-center">
                            <div class="profile-image mb-30">
                                @if ($admission->patient->gender == 'masculin')
                                    <img src="{{ asset('assets/images/avatar/6.png') }}" class="box-shadowed rounded-circle"
                                        alt="Photo de profil" />
                                @elseif($admission->patient->gender == 'feminin')
                                    <img src="{{ asset('assets/images/avatar/2.png') }}" class="box-shadowed rounded-circle"
                                        alt="Photo de profil" />
                                @else
                                    <img src="{{ asset("assets/uploads/patient/$patient->img_url") }}"
                                        class="box-shadowed rounded-circle" alt="Photo de profil" />
                                @endif

                            </div>
                            <div>
                                <h3 class="mb-0"><strong>{{ $admission->patient->user->name }}</strong>
                                    {{ $admission->patient->user->prenom }}</h3>
                                <span class="job_post">{{ $admission->patient->profession }}</span>
                                <p class="mb-0">{{ $admission->patient->currentResidence->name }}<br></p>
                            </div>
                        </div>
                        <div class="box-body">
                            <hr>
                            <div class="workingtime">
                                <h4 class="fw-500">Date d'admission</h4>
                                <h5 class="text-muted">
                                    @php
                                        $dateAdmission = $admission->date_admission;
                                        $jour = \Carbon\Carbon::parse($dateAdmission)
                                            ->locale('fr')
                                            ->format('l');
                                        echo jourFr($jour);
                                    @endphp
                                </h5>
                                <p>
                                    @php
                                        $dateAdmission = date_create($admission->date_admission);
                                        $dateFormatted = date_format($dateAdmission, 'd-m-Y à H:i:s');
                                        echo $dateFormatted;
                                    @endphp
                                </p>
                                <hr>
                                <div style="font-size:18px; padding:10px;"><a
                                        href="{{ route('cashier.admission.imprimer', $admission->id) }}" target="_blank"
                                        class="btn" style="background-color:blue; color:white">Imprimer l'admission <span
                                            class="fa fa-print"></span></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="workingtime">
                                        <h5 class="fw-500">Medecin en Charge</h5><br>
                                        <h4 class="text-muted">
                                            <strong>{{ $admission->doctor->user->name ?? $admission->infirmier->user->name }}</strong>
                                        </h4>
                                        <p>{{ $admission->doctor->matricule ?? $admission->infirmier->matricule }} |
                                            {{ $admission->doctor->typeDoctor->label ?? 'Infirmier(e)' }} |
                                            {{ $admission->doctor->contact ?? $admission->infirmier->contact }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <div class="workingtime">
                                        <p class="fw-500"><b>Montant à payer : </b> <span
                                                class="badge badge-danger">{{ $admission->montant }} F CFA</span></p>
                                        <p class="fw-500"><b>Statut : </b>
                                            @if ($admission->statut_paiement == 1)
                                            <span class="badge badge-success">Consultation payé</span>@else<span
                                                    class="badge badge-warning">Paiement en attente</span>
                                            @endif
                                        </p>
                                        <p class="fw-500"><b>Approuvé par : </b>
                                            @if ($admission->statut_validation == 1)
                                                <span
                                                    class="badge badge-info">{{ $admission->cashier->user->name ?? null }}</span>
                                            @else
                                                <span class="badge badge-info">Pas encore approuvé</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-admission"><a class="nav-link active show" data-bs-toggle="tab"
                                    href="#about">Information sur l'admission</a></li>
                        </ul><br>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="about">
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">

                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <h5><i class="fa fa-clone"></i>&nbsp;<strong> Type d'admission :
                                                            </strong> </h5>
                                                    </th>
                                                    <td>
                                                        <h5>{{ $admission->type_admission }}</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <h5><i class="fa fa-building"></i>&nbsp;<strong> Type de visite :
                                                            </strong> </h5>
                                                    </th>
                                                    <td>
                                                        <h5>
                                                            @if ($admission->type_examen_id == null)
                                                                <span
                                                                    class="badge badge-primary">{{ $admission->prestationHospital }}
                                                                </span>
                                                            @else
                                                                <span class="badge badge-info">{{ $admission->typeExamen }}
                                                                </span>
                                                            @endif
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <h5><i class="fa fa-wheelchair-alt"></i>&nbsp;<strong> Protection
                                                                sociale : </strong></h5>
                                                    </th>
                                                    <td>
                                                        <h5>
                                                            @if ($admission->type_assurance != null)
                                                                {{ $admission->type_assurance->libelle }},
                                                                {{ $admission->no_assurance }}
                                                            @else
                                                                <span style="color:red;">Pas de protection sociale</span>
                                                            @endif
                                                        </h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        <h5><i class="fa fa-random"></i>&nbsp;<strong> Mode d'entrée :
                                                            </strong> </h5>
                                                    </th>
                                                    <td>
                                                        <h5>{{ $admission->mode_entree }}</h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br />
                                <h4><strong>Motif de la consultation</strong></h4>
                                <textarea rows="5" class="form-control" readonly>{{ $admission->motif_consultation }}</textarea>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    @endif

@endsection
