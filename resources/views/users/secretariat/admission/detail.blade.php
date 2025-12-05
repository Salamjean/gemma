@extends('layouts.dashboard',['title' => "Détail Admission"])

@section('content')
  @if(auth()->user()->role_as == 'secretariat')
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ back()->getTargetUrl() }}" class="btn btn-primary float-end mb-10"><span class="glyphicon glyphicon-chevron-left"></span>Retour en arrière</a>
            </div>
        </div>
          <div class="row clearfix">
              <div class="col-lg-4 col-md-4">
                  <div class="box profile-header">
                      <div class="box-body text-center">
                          <div class="profile-image mb-10">
                              @if ($admission->patient->img_url != null)
    								<img src="{{ asset('assets/uploads/patient/'. $admission->patient->img_url) }}"
    									class="rounded-circle" alt="Photo de profil" style="width:128px; height:128px" />
    							@else
    							    @if ($admission->patient->gender == 'masculin')
    								<img src="{{ asset('assets/images/avatar/6.png') }}" class="avatar avatar-lg rounded10"
    									alt="Photo de profil" />
        							@else
        								<img src="{{ asset('assets/images/avatar/2.png') }}" class="avatar avatar-lg rounded10"
        									alt="Photo de profil" />
        							@endif
    							@endif

                            </div>
                          <div>
                              <h3 class="mb-0"><strong>{{ $admission->patient->user->name }}</strong> {{ $admission->patient->user->prenom }}</h3>
                              <span class="job_post">{{ $admission->patient->profession }}</span>
                              <p class="mb-0">{{ $admission->patient->currentResidence->name }}<br></p>
                          </div>
                      </div>
                      <div class="p-10">
                        <hr/>
                        <h4>N° dossier médical : <span class="fw-bold"> {{ $admission->patient->code_patient}}</span></h4>
                        <h4>N° Téléphone : <span class="fw-bold"> {{ $admission->patient->telephone}}</span></h4>
                      </div>
                        <div class="box-body p-10">
                            <hr>
                            <div class="workingtime">
                                <h4 class="fw-500">Date d'admission</h4>
                                <h5 class="text-muted fs-18">
                                  @php
                                      $dateAdmission = $admission->date_admission;
                                      $jour = \Carbon\Carbon::parse($dateAdmission)->locale('fr')->format('l');
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
                                <div style="font-size:18px; padding:10px;"><a href="{{ route('secretariat.admission.imprimer', $admission->id) }}" target="_blank" class="btn" style="background-color:blue; color:white">Imprimer l'admission <span class="fa fa-print"></span></a></div>
                            </div>

                        </div>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="box">
                            <div class="box-body">
                              @if ($admission->doctor)
                                <div class="workingtime">
                                    <h5 class="fw-500">Medecin en Charge</h5><br>
                                    <h4 class="text-muted"><strong>{{ $admission->doctor->user->name }}</strong></h4>
                                    <p>{{ $admission->doctor->matricule }} | {{ $admission->doctor->typeAgent->libelle }} | {{ $admission->doctor->contact }}</p>
                                </div>
                              @elseif ($admission->infirmier)
                              <div class="workingtime">
                                <h5 class="fw-500">Infirmier en Charge</h5><br>
                                <h4 class="text-muted"><strong> {{ $admission->infirmier->user->name }}</strong></h4>
                                <p>{{ $admission->infirmier->matricule }} | {{ $admission->infirmier->libelle }} | {{ $admission->infirmier->contact }}</p>
                              </div>
                              @endif
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="workingtime">
                                    <p class="fw-500"><b>Montant à payer : </b> @if($admission->montant == 0)<span class="badge badge-danger">Gratuit</span>@else <span class="badge badge-danger">{{ $admission->montant }} F CFA</span>@endif</p>
                                    <p class="fw-500"><b>Statut : </b>@if ($admission->statut_paiement == 1)<span class="badge badge-success">Consultation payé</span>@else<span class="badge badge-warning">Paiement en attente</span>@endif </p>
                                    <p class="fw-500"><b>Approuvé par : </b>@if ($admission->statut_validation == 1) <span class="badge badge-info">{{ $admission->cashier->user->name ?? NULL }}</span> @else  <span class="badge badge-info">Pas encore approuvé</span> @endif</p>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="box box-body">
                      <ul class="nav nav-tabs">
                          <li class="nav-admission"><a class="nav-link active show" data-bs-toggle="tab" href="#about">Information sur l'admission</a></li>
                      </ul><br>
                      <div class="tab-content">
                          <div class="tab-pane active show" id="about">
                            <div class="box-body">
                                <div class="table-responsive">
                                  <table class="table table-hover mb-0">

                                      <tbody>
                                        <tr>
                                          <th scope="row"><h5><strong> Type d'admission : </strong> </h5></th>
                                          <td><h5>{{ $admission->type_admission }}</h5></td>
                                        </tr>
                                        <tr>
                                          <th scope="row"><h5><strong> Motif de la visite : </strong> </h5></th>
                                          <td>
                                            <h5>
                                              <span class="badge badge-primary">{{ $admission->serviceHopital->prestationHospital->service->libelle ?? null}} </span>
                                            </h5>
                                          </td>

                                        </tr>
                                        <tr>
                                            <th scope="row"><h5><strong> Protection sociale : </strong></h5></th>
                                            <td><h5>@if($admission->type_assurance != null) {{ $admission->type_assurance->libelle }}, {{ $admission->no_assurance }} @else Pas de protection sociale @endif</h5></td>
                                          </tr>
                                          <tr>
                                            <th scope="row"><h5><strong> Mode d'entrée : </strong>  </h5></th>
                                            <td><h5>{{ $admission->mode_entree }}</h5></td>
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
