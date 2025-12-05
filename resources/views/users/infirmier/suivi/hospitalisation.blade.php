@extends('layouts.dashboard', ['title' => 'Suivi Hospitalisation'])
@section('content')
<div class="container">
    
    <div class="box bb-3 border-dark pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('assets/images/avatar/6.png') }}" class="rounded-circle" alt="Photo de profil"/>      
            </div>
            <div class="col-md-10">
                <div class="px-2">
                    <div class="px-5 bg-color">
                        <div class="row">
                            <div class="d-flex justify-content-between mt-10">
                                <div class="">
                                    <label class="form-label">N° Dossier médical | <span class="fw-bold fs-18"><span id="dm_patient"
                                                style="color:red;">DM160419501</span></span></label>
                                </div>
                                <div class="d-flex items-center pb-1">

                                    <span class=" d-flex mt-1 text-success">
                                        <span>Admission du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                        <pre>  </pre> |
                                        <pre>  </pre> <span>Ordre
                                            N°</span>
                                        <pre>  </pre>
                                    </span>
                                    <a href="" title="dossier medical" class="btn btn-sm  btn-secondary mx-1"
                                        target="_blank"><i class="fa-solid fa-print"></i></a>
                                    <a href="#" title="info patient"
                                        class="btn btn-sm  btn-success mx-1" target="_blank"><i class="fa-solid fa-info"></i></a>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="KOUASSI N'GORAN ROMEO KOUAME"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                    <input type="text" class="form-control" id="birth_date" name="birth_date"
                                        value="16/04/1995" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="age" class="form-label"> <b>Age </b></label>
                                    <input type="text" class="form-control" id="age" name="age"
                                        value="26 ans" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="gender" class="form-label"> <b>Sexe </b></label>
                                    <input type="text" class="form-control" id="gender" name="gender"
                                        value="Masculin" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><b>Résidence Actuelle</b></label>
                                <input type="text" class="form-control"
                                    value="Cocody Riviera 2" readonly />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label"><b>Contact</b></label>
                                <input type="text" class="form-control"
                                    value="0707267572" readonly />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label"><b>N° Assurance</b></label>
                                <input type="text" class="form-control"
                                    value="AXA178992" readonly />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><b>Motif de la consultation</b></label>
                                <textarea type="text" class="form-control" name="motif_consultation" id="motif_consultation"
                                    value="Probleme d'apenecie" readonly>Probleme d'apenecie</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box bb-3 border-danger mb-20 pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
        <div class="">
            <div class="card">
                <div class="card-body pt-3">
                   
                    <div class="tab-content pt-2">

                        @foreach ($hospitalisation->daysHospitalisation as $key => $day)
                            <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }} day{{ $key }}"
                                id="day{{ $key }}">
                                
                                <div class="d-flex justify-content-between">
                                    <h3>Protocoles thérapeutiques</h3>
                                    
                                </div>
                                <div class="">
                                    <table class="table table-bordered  table-hover">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th>Nom du produit à administrer</th>
                                                <th>Quantité(s)</th>
                                                <th>Dosage</th>
                                                <th>Voie d'admission</th>
                                                <th>Heures d'application</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($day->therapeutiqueProtocols as $key => $therap)
                                                <tr>
                                                    <td>{{ $therap->drugHospital->drug->name }} </td>
                                                    <td>{{ $therap->quantity }} </td>
                                                    <td>{{ $therap->dosage }} </td>
                                                    <td>{{ $therap->voie_admission }} </td>
                                                    <td>
                                                        <div class="row">
                                                            @foreach ($therap->protocolHourApplications as $hour)
                                                                <div class="col-md-6">
                                                                    <table
                                                                        class="table table-bordered  table-hover">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $hour->hour }}</td>
                                                                                <td class="text-center">
                                                                                    @if ($hour->status === 'pending')
                                                                                    <a href="#" onclick="appliqueProtocol(event, {{ $hour->id }})">
                                                                                        <span class="badge badge-warning">{{ $hour->status }}</span>
                                                                                    </a>
                                                                                    <!--
                                                                                        <form method="POST" action="{{ route("infirmier.suivi.applique", ["id" => $hour->id]) }}">
                                                                                            @csrf
                                                                                            <button class="btn btn-sm btn-warning">{{ $hour->status }}</button>
                                                                                        </form>
                                                                                    -->
                                                                                    @else
                                                                                        <span class="badge badge-success">Appliqué</span>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        @endforeach
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="box bb-3 border-info pe-90 pb-20 px-90 ps-60 pt-20 bg-color">
        <div>
            <div class="box">
                <div class="box-body">
                    <h4 class="box-title">SURVEILLANCE</h4>
                    <div class="table-responsive">
                        <table class="table b-1 border-success">
                            <thead class="bg-success">
                                <tr>
                                    <th></th>
                                    @foreach ($surveillances as $surveillance)
                                        <th>{{ "H" . $loop->iteration }} </th> 
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TA(mmHg)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->ta }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>T°(°C)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->t }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>POULS(bpm)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->pouls }}</td>
                                    @endforeach 
                                </tr>
                                <tr>
                                    <td>DIERESE(ml)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->diurese }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>CONSCIENCE</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->conscience }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>GLYCEMIE(g/dl)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->glycemie }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>SaO2</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->sao2 }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Poids(kg)</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td>{{ $surveillance->poids }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Heure</td>
                                    @foreach ($surveillances as $surveillance)
                                        <td><span class="badge badge-success"><i class="fa fa-clock"></i> {{ $surveillance->hour }}</span></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="box">
                <div class="box-body">
                    <form action="{{ route('infirmier.suivi.surveillance') }}" class="form-horizontal" method="POST">
                        @csrf
                        <input type="hidden" name="day_hospitalisation_id" value="{{$day_hospitalisation->id}}" />
                        <input type="hidden" name="hour" value="{{ Carbon\Carbon::now() }}" />
                        <div class="box bb-4 border-success pe-10 pb-20 px-10 ps-20 pt-20">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="box-title">TA(mmHg)</div>
                                    <input type="text" class="form-control" placeholder="______" name="ta"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">T°(°C)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="temperature"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">POULS(batt/m)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="pouls"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">DIERESE(ml)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="dierese"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">CONSCIENCE</div>
                                    <input type="text" class="form-control" placeholder=".........." name="conscience"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">GLYCEMIE(g/dl)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="glycemie"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">SaO2(%)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="sao2"/>
                                </div>
                                <div class="col-md-3">
                                    <div class="box-title">Poids(kg)</div>
                                    <input type="text" class="form-control" placeholder=".........." name="poids"/>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="float-end">
                                <button type="button" class="btn btn-warning me-1">
                                    <i class="ti-trash"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Valider
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!--
<script>
    function appliqueProtocol(event) {
        event.preventDefault(); 

        Swal.fire({
            title: 'Confirmation ...',
            text: "Avez-vous appliqué le protocol renseigné par le Medecin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Oui, j'ai appliqué!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '#';
            }
        });
    }
</script>
-->
<script>
    $(document).ready(function() {
        function newVisite() {
            $('#visite__item').append(`
            <div class="box bb-4 border-success pe-10 pb-20 px-10 ps-20 pt-20">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box-title">TA(mmHg)</div>
                        <input type="text" class="form-control" placeholder="______" name="ta"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">T°(°C)</div>
                        <input type="text" class="form-control" placeholder=".........." name="temperature"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">POULS(batt/m)</div>
                        <input type="text" class="form-control" placeholder=".........." name="pouls"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">DIERESE(ml)</div>
                        <input type="text" class="form-control" placeholder=".........." name="dierese"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">CONSCIENCE</div>
                        <input type="text" class="form-control" placeholder=".........." name="conscience"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">GLYCEMIE(g/dl)</div>
                        <input type="text" class="form-control" placeholder=".........." name="glycemie"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">SaO2(%)</div>
                        <input type="text" class="form-control" placeholder=".........." name="sao2"/>
                    </div>
                    <div class="col-md-3">
                        <div class="box-title">Poids(kg)</div>
                        <input type="text" class="form-control" placeholder=".........." name="poids"/>
                    </div>
                </div>
            </div>
            `);

            $(".custom-select-heightI").select2({
                width: "100%",
            });

            $(document).on('click', '.remove__visite__btn', function(e) {
                e.preventDefault();
                let item = $(this).closest('.box');
                $(item).remove();
            });
        }
        $(`.add__visite__btn`).click(newVisite);
    });
</script>
<script>
    function appliqueProtocol(event, hourId) {
        event.preventDefault(); 

        Swal.fire({
            title: 'Confirmation ...',
            text: "Avez-vous appliqué le protocole renseigné par le médecin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Oui, j'ai appliqué!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('infirmier.suivi.applique', ['id' => ':id']) }}".replace(':id', hourId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        Swal.fire(
                            'Appliqué!',
                            response.message, 
                            'success'
                        ).then(() => {
                            location.reload(); 
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Erreur!',
                            'Une erreur s\'est produite lors de l\'application du protocole.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
@endsection