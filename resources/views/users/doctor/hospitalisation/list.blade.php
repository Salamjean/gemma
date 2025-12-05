@extends('layouts.dashboard', ['title' => "Liste des patients en Hospitalisation"])

@section('content')
    <div class="box">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead class="bg-danger">
                        <tr>
                            <th class="bb-2">N° Dossier médical</th>
                            <th class="bb-2">Nom & Prénoms</th>
                            <th class="bb-2">Date debut</th>
                            @if (count($hospitalisations) != 0 && $hospitalisations[0]->status != 'in_progress')
                                <th class="bb-2">Date fin</th>
                            @endif
                            <th class="bb-2">Nombre de jours</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitalisations as $item)
                            <tr>
                                <td><b>{{ $item->consultation->patient->code_patient }}</b></td>
                                <td class="text-center">
                                    {{ $item->consultation->patient->user->name }}
                                    {{ $item->consultation->patient->user->prenom }}
                                </td>
                                <td class="text-center">
                                    {{ dateNumberFr($item->created_at) }}
                                </td>
                                @if (count($hospitalisations) != 0 && $item->status != 'in_progress')
                                    <td class="text-center">
                                        {{ dateNumberFr($item->end_date) }}
                                    </td>
                                @endif
                                <td class="text-center">

                                    @if ($item->status != 'in_progress')
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->date)->diffInDays($item->end_date) + 2 }}
                                    @else
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->date)->diffInDays(\Carbon\Carbon::now()) }}
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($item->status == 'in_progress')
                                        <span class="badge badge-warning p-5">En cours</span>
                                    @else
                                        <span class="badge badge-primary p-5">Terminé</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status == 'in_progress')
                                        <a href="{{ route('doctor.hospitalisation.edit', $item->id) }}"
                                            class="btn btn-warning">Poursuivre</a>
                                    @else
                                        <a href="{{ route('doctor.hospitalisation.manufacturing', $item->id) }}"
                                            class="btn btn-warning">Facture</a>
                                    @endif
                                    <a href="{{ route('doctor.hospitalisation.detail', $item->id) }}" class="btn btn-info"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom">Détail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
