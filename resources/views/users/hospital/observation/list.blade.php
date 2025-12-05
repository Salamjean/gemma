@extends('layouts.dashboard', ['title' => 'Liste des patients mise en observation dans votre hopital'])

@section('content')
    <div class="box">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">N° Dossier médical</th>
                            <th class="bb-2">Nom & Prénom (s)</th>
                            <th class="bb-2">Date d'observation'</th>
                            <th class="bb-2">Durée</th>
                            <th class="bb-2">Date fin</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($observations as $item)
                            <tr>
                                <td><b>{{ $item->consultation->patient->code_patient }}</b></td>
                                <td>
                                    {{ $item->consultation->patient->user->name }}&nbsp;{{ $item->consultation->patient->user->prenom }}
                                </td>
                                <td class="text-center">
                                    {{ dateFr($item->created_at) }} à {{ heureFr($item->created_at) }}
                                </td>
                                <td class="text-center">
                                    {{ $item->duree }}
                                </td>
                                <td class="text-center">
                                    {{ dateFr($item->date_fin) }} à {{ heureFr($item->date_fin) }}
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('hospital.observation.detail', $item->id) }}" class="btn btn-info"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom">Voir détail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
