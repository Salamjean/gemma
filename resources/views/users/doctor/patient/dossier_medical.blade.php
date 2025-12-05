@extends('layouts.dashboard', ['title' => 'Dossier Médical ' . $patient->code_patient])

@section('content')
    <div class="container">
        <div class="box bb-3 border-dark pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
            <div class="row">
                <div class="col-md-2">
                    @if ($patient->img_url != null)
                        <img src="{{ asset('assets/uploads/patient/' . $patient->img_url) }}"
                            class="rounded-circle" alt="Photo de profil" style="width:128px; height:128px" />
                    @else
                        @if ($patient->gender == 'masculin')
                            <img src="{{ asset('assets/images/avatar/6.png') }}" class="rounded-circle"
                                alt="Photo de profil" />
                        @else
                            <img src="{{ asset('assets/images/avatar/2.png') }}" class="rounded-circle"
                                alt="Photo de profil" />
                        @endif
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="px-2">
                        <div class="px-5 bg-color">
                            <div class="row">
                                <div class="d-flex justify-content-between mt-10">
                                    <div class="">
                                        <label class="form-label">N° Dossier médical | <span class="fw-bold fs-18"><span id="dm_patient"
                                                    style="color:red;">{{ $patient->code_patient }}</span></span></label>
                                    </div>
                                    <div class="d-flex items-center pb-1">
                
                                        <span class=" d-flex mt-1 text-success">
                                            <span>Consultation du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                            <pre>  </pre> |
                                            <pre>  </pre> <span>Ordre
                                                N°{{ noOrdreConsultation() }}</span>
                                            <pre>  </pre>
                                        </span>
                                       {{--  <a href="" title="dossier medical" class="btn btn-sm  btn-secondary mx-1"><i class="fa-solid fa-print"></i></a> --}}
                                        <a href={{ route('doctor.patient.detail', $patient->id) }}" title="info patient"
                                            class="btn btn-sm  btn-success mx-1"><i class="fa-solid fa-info"></i></a>
                                    </div>
                                </div>
                                <hr>
                                @php
                                    $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $patient->birth_date);
                                    $age = $agePatient->diffInYears(Carbon\Carbon::now());
                                @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $patient->user->name }} {{ $patient->user->prenom }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                        <input type="text" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ $patient->birth_date }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                            value="{{ $patient->gender }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label"><b>Résidence Actuelle</b></label>
                                    <input type="text" class="form-control"
                                        value="{{ $patient->residenceActuelle->name }}" readonly />
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label"><b>Contact</b></label>
                                    <input type="text" class="form-control"
                                        value="{{ $patient->telephone }}" readonly />
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label"><b>N° Assurance</b></label>
                                    <input type="text" class="form-control"
                                        value="{{ $patient->no_assurance }}" readonly />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-20 me-60 mx-60">
                @if($consultations)
                <div class="box bb-3 border-warning pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold text-center text-dark">Liste des Consultations</h4>
                        </div>
                        <div class="card-body">
                            @foreach($consultations as $item)
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width: 1%"><span class="fw-bold">{{ $item->code_consultation }}</span> / {{ DateFr($item->date_consultation) }}</td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h6 class="fw-bold">Détails</h6>
                                                                            <table class="table table-bordered">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>Hôpital</td>
                                                                                        <td>{{ $item->hospital->label }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Service</td>
                                                                                        <td>{{ $item->admission->type_admission }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Prestation</td>
                                                                                        <td>{{ $item->prestationHospital->prestationService->libelle }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Motif consultation</td>
                                                                                        <td>{{ $item->admission->motif_consultation }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="fw-bold">Constantes du patient</h6>
                                                                            <table class="table table-bordered">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>Taille</td>
                                                                                        <td>{{ $item->taille }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Poids</td>
                                                                                        <td>{{ $item->poids }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>IMC</td>
                                                                                        <td>{{ $item->imc }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Température</td>
                                                                                        <td>{{ $item->temperature }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    @if($ordonnance_interne)
                                                    <tr>
                                                        <td colspan="3">
                                                            <h6 class="fw-bold">Ordonnance Interne</h6>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom du médicament</th>
                                                                        <th>Dosage</th>
                                                                        <th>Quantité</th>
                                                                        @if ($ordonnance_interne->type === 'interne')
                                                                            <th>P.Unitaire</th>
                                                                            <th>P.Total</th>
                                                                        @endif
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($ordonnance_interne->prescriptions as $medicament)
                                                                        <tr>
                                                                            <td>
                                                                                @if ($ordonnance_interne->type === 'interne')
                                                                                    {{ $medicament->drugHospital->drug->name }}
                                                                                @else
                                                                                    {{ $medicament->drug->name }}
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ $medicament->dosage }}</td>
                                                                            <td>{{ $medicament->quantity }}</td>
                                                                            @if ($ordonnance_interne->type === 'interne')
                                                                                <td>{{ $medicament->drugHospital->price  . ' FCFA' ?? '' }}</td>
                                                                                <td>{{ $medicament->drugHospital->price ? $medicament->drugHospital->price * intval($medicament->quantity) . ' FCFA' : '' }}</td>
                                                                            @endif
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="5">vide...</td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($ordonnance_externe)
                                                    <tr>
                                                        <td colspan="3">
                                                            <h6 class="fw-bold">Ordonnance Externe</h6>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom du médicament</th>
                                                                        <th>Dosage</th>
                                                                        <th>Quantité</th>
                                                                        @if ($ordonnance_externe->type === 'interne')
                                                                            <th>P.Unitaire</th>
                                                                            <th>P.Total</th>
                                                                        @endif
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($ordonnance_externe->prescriptions as $medicament)
                                                                        <tr>
                                                                            <td>
                                                                                @if ($ordonnance_externe->type === 'interne')
                                                                                    {{ $medicament->drugHospital->drug->name }}
                                                                                @else
                                                                                    {{ $medicament->drug->name }}
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ $medicament->dosage }}</td>
                                                                            <td>{{ $medicament->quantity }}</td>
                                                                            @if ($ordonnance_externe->type === 'interne')
                                                                                <td>{{ $medicament->drugHospital->price  . ' FCFA' ?? '' }}</td>
                                                                                <td>{{ $medicament->drugHospital->price ? $medicament->drugHospital->price * intval($medicament->quantity) . ' FCFA' : '' }}</td>
                                                                            @endif
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="5">vide...</td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                            @if (\App\Models\Registre::where('consultation_id', $item->id)->exists())
                                                                <td>
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <h6 class="fw-bold">Observation Médecin</h6>
                                                                                @foreach ($registres as $registre)
                                                                                    <tr>
                                                                                        <td>{{ $registre->issue_consultation_justification }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <table class="table table-bordered">
                                                                        <tbody>
                                                                            @foreach ($registres as $registre)
                                                                                <h6 class="fw-bold">Issue Consultation</h6>
                                                                                <tr>
                                                                                    <td><span class="badge badge-primary">{{ $registre->issue_consultation }}</span></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <span style="cursor: pointer" class="badge badge-dark" data-bs-toggle="modal" data-bs-target=".registre-modal">Voir le Registre</span>
                                                                </td>
                                                            @else
                                                            <td colspan="5">
                                                                <span class="badge badge-danger-light items-center">Consultation non terminée</span>
                                                            </td>
                                                            @endif
                                                           
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.modal -->
                            <div class="modal fade registre-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Registe <b>{{ $registre->code }}</b></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if($registre->type_consultation == 'consultation curative')
                                                @include('users.doctor.consultation.formulaire.consultation.currative')
                                            @elseif($registre->type_consultation == 'accouchement')
                                                @include('users.doctor.consultation.formulaire.consultation.accouchement')
                                            @elseif($registre->type_consultation == 'post-natale')
                                                @include('users.doctor.consultation.formulaire.consultation.post-natale')
                                            @elseif($registre->type_consultation == 'pre-natale')
                                                @include('users.doctor.consultation.formulaire.consultation.pre-natale')
                                            @else
                                                <h2 class="card-title text-bg-danger">Nous n'avons pas trouvé de Régistre !</h2>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-start" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                @else
                <h5 class="fw-bold text-danger ">Pas de consultation(s) éffectuée(s)</h5>
                @endif
            </div>
        </div>
    </div>
@endsection