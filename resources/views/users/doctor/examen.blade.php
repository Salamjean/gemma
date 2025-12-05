
@extends('layouts.dashboard', ['title' => 'Liste des consultations'])

@section('content')

    <div class="box-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                <thead>
                    <tr>
                        <th class="bb-2">Reference</th>
                        <th class="bb-2">Nom du Patient</th>
                        <th class="bb-2">Motif</th>
                        <th class="bb-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($examens as $item)
                <tr>
                    <td><b>{{  $item->patient->code_patient }}</b></td>
                    <td>
                        {{ $item->patient->user->name }}&nbsp; {{ $item->patient->user->prenom }}
                    </td>
                        <td class="" style="width: 200px;"> {{ $item->prestationHospital->service->libelle }} </td>


                    <td class="text-center">
                        <a href="{{ route('doctor.consultation.formulaire', $item->id) }}" class="btn btn-sm btn-info" id="menu"title="Menu">
                            <span class="">Commencer la consultation</span>

                        </a>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection