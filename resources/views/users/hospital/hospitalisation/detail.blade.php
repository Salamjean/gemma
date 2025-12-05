@extends('layouts.dashboard', ['title' => 'Mise en hospitalisation'])

@section('content')
    <div class="box"> 
        <div class="box-header">
            <span>
                <i class="fa fa-bed" aria-hidden="true"></i>
            </span>
            <b>Détail de mise en hospitalisation</b>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <tbody>
                        <tr>
                            <th>N° Dossier médical</th>
                            <td>
                                <b>
                                    <a
                                        href="{{ route('hospital.patient.detail', $hospitalisation->consultation->patient->id) }}">

                                        {{ $hospitalisation->consultation->patient->code_patient }}</a>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Nom & Prénom (s)</th>
                            <td>
                                {{ $hospitalisation->consultation->patient->user->name }}&nbsp;{{ $hospitalisation->consultation->patient->user->prenom }}
                            </td>
                        </tr>
                        <tr>
                            <th>N° de consultation</th>
                            <td>
                                <a
                                    href="{{ route('hospital.consultation.detail', $hospitalisation->consultation_id) }}">{{ $hospitalisation->consultation->code_consultation }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro de la chambre</th>
                            <td>
                                {{ $hospitalisation->no_chambre }}
                            </td>
                        </tr>
                        <tr>
                            <th>Numéro du lit</th>
                            <td>
                                {{ $hospitalisation->no_lit }}
                            </td>
                        </tr>
                        <tr>
                            <th>Date d'observation</th>
                            <td>
                                {{ dateFr($hospitalisation->created_at) }} à {{ heureFr($hospitalisation->created_at) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Durée</th>
                            <td>
                                @php
                                    $dateHospitalisation = \Carbon\Carbon::parse($hospitalisation->date_hospitalisation);
                                    $dateCloture = \Carbon\Carbon::parse($hospitalisation->date_cloture);
                                    $reste = $dateHospitalisation->diffInHours($dateCloture) % 24;
                                @endphp
                                {{ $dateHospitalisation->diffInHours($dateCloture) }} Heures soit
                                {{ $dateHospitalisation->diffInDays($dateCloture) }} Jour(s) et {{ $reste }} Heure(s)
                            </td>                            
                        </tr>   
                        <tr>
                            <th>Date fin</th>
                            <td>
                                <b>{{ dateFr($hospitalisation->date_cloture) }} </b>
                            </td>
                        </tr>

                        <tr>
                            <th>Observation</th>
                            <td>
                                {{ $hospitalisation->observation }}
                            </td>
                        </tr>
                        <tr>
                            <th>Diagnostic</th>
                            <td>
                                {{ $hospitalisation->diagnostic }}
                            </td>
                        </tr>

                        <tr>
                            <th>Pathologies</th>
                            <td>
                                @if (!empty($hospitalisation->pathologies) && count($hospitalisation->pathologies) > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><b>Libelle</b></th>
                                            <td><b>Date</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitalisation->pathologies as $item)
                                            <tr>
                                                <td><b>{{ $item->libelle }}</b></td>
                                                <td>{{ $item->date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                vide
                            @endif
                            

                            </td>
                        </tr>
                        <tr>
                            <th>Soins administrés</th>
                            <td>
                                @if (!empty($hospitalisation->soins) && count($hospitalisation->soins) > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><b>Libelle</b></th>
                                            <td><b>Date</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitalisation->soins as $item)
                                            <tr>
                                                <td><b>{{ $item->libelle }}</b></td>
                                                <td>{{ $item->date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                vide
                            @endif                            
                            </td>
                        </tr>
                        <tr>
                            <th>Traitement administré</th>
                            <td>
                                @if (!empty($hospitalisation->traitements) && count($hospitalisation->traitements) > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><b>Libelle</b></th>
                                            <td><b>Date</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitalisation->traitements as $item)
                                            <tr>
                                                <td><b>{{ $item->libelle }}</b></td>
                                                <td>{{ $item->date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                vide
                            @endif
                            
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
