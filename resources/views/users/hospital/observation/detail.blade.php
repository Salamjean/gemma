@extends('layouts.dashboard', ['title' => 'Détail de mise en observation'])

@section('content') 
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Détail de mise en observation</h3>
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
                                        href="{{ route('hospital.patient.detail', $observation->consultation->patient->id) }}">

                                        {{ $observation->consultation->patient->code_patient }}</a>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <th>Nom & Prénom (s)</th>
                            <td>
                                {{ $observation->consultation->patient->user->name }}&nbsp;{{ $observation->consultation->patient->user->prenom }}
                            </td>
                        </tr>
                        <tr>
                            <th>N° de consultation</th>
                            <td>
                                <a
                                    href="{{ route('hospital.consultation.detail', $observation->consultation_id) }}">{{ $observation->consultation->code_consultation }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Date d'observation</th>
                            <td>
                                {{ dateFr($observation->created_at) }} à {{ heureFr($observation->created_at) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Durée</th>
                            <td>
                                {{ $observation->duree }}
                            </td>
                        </tr>
                        <tr>
                            <th>Date fin</th>
                            <td>
                                <b>{{ dateFr($observation->date_fin) }} à {{ heureFr($observation->date_fin) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <th>Observation</th>
                            <td>
                                {{ $observation->observation }}
                            </td>
                        </tr>
                        <tr>
                            <th>Prescription</th>
                            <td>
                                {{ $observation->prescription }}
                            </td>
                        </tr>
                        <tr>
                            <th>Diagnostic</th>
                            <td>
                                {{ $observation->diagnostic }}
                            </td>
                        </tr>

                        <tr>
                            <th>Pathologies</th>
                            <td>
                                @if (count($observation->pathologies) > 0)
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Libelle</b></th>
                                                <td>
                                                    <b>Date</b>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($observation->pathologies as $item)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            {{ $item->libelle }}
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ $item->date }}
                                                    </td>
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
                                @if (count($observation->soins) > 0)
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Libelle</b></th>
                                                <td>
                                                    <b>Date</b>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($observation->soins as $item)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            {{ $item->libelle }}
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ $item->date }}
                                                    </td>
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
                                @if (count($observation->traitements) > 0)
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Libelle</b></th>
                                                <td>
                                                    <b>Date</b>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($observation->traitements as $item)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            {{ $item->libelle }}
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ $item->date }}
                                                    </td>
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
