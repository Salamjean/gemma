@extends('layouts.dashboard',['title' => "Liste des patients en Hospitalisation"])

@section('content')
    <div class="box">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">N° Dossier médical</th>
                            <th class="bb-2">Date d'hospitalisation</th>
                            <th class="bb-2">Durée</th>
                            <th class="bb-2">Date fin</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitalisations as $item)
                            <tr>
                                <td><b>{{ $item->consultation->patient->code_patient }}</b></td>

                                <td class="text-center">
                                    {{ dateFr($item->created_at) }} à {{ heureFr($item->created_at) }}
                                </td>
                                <td class="text-center">
                                    @php
                                        $reste = \Carbon\Carbon::parse($item->date_hospitalisation)->diffInHours($item->date_cloture) % 24;
                                    @endphp
                                {{ \Carbon\Carbon::parse($item->date_hospitalisation)->diffInHours($item->date_cloture) }} Heures soit {{ \Carbon\Carbon::parse($item->date_hospitalisation)->diffInDays($item->date_cloture) }} Jour(s) et {{ $reste }} Heure(s)
                                </td>
                                <td class="text-center">
                                    {{ dateFr($item->date_cloture) }}
                                </td>
                                <td class="text-center">
                                    @if ($item->date_cloture < date('Y-m-d'))
                                        <span class="badge badge-success p-5">Terminée</span>
                                    @else
                                        <span class="badge badge-primary p-5">En cours</span> {{ \Carbon\Carbon::parse($item->date_cloture)->diffInHours(\Carbon\Carbon::now()) }} Heures
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('hospital.hospitalisation.detail', $item->id) }}" class="btn btn-info"
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
