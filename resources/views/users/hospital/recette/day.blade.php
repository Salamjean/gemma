@extends('layouts.dashboard', ['title' => 'La recette du ' . dateCompletFr($day) ])

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">N° Matricule</th>
                            <th class="bb-2">Nom & Prénom (s)</th>
                            <th class="bb-2">Nombre de consultation</th>
                            <th class="bb-2">Somme collectée</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admissions as $item)
                            <tr>
                                <td><b>{{ $item->matricule }}</b></td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td class="text-center">
                                    {{ $item->nb }}
                                </td>
                                <td class="text-center">
                                    {{ $item->sum }} Frs
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
