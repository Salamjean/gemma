@extends('layouts.dashboard', ['title' => 'Liste des declarations de dèces'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div style="display:flex; justify-content: space-between;">
                        <div class="">
                            <h4 class="box-title">DECLARATION DE DECES</h4>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th class="bb-2">N°</th>
                                    <th class="bb-2">Réference</th>
                                    <th class="bb-2">Date/Heure</th>
                                    <th class="bb-2">Type patient</th>
                                    <th class="bb-2">Milieu</th>
                                    <th class="bb-2">Deces maternel</th>
                                    <th class="bb-2">Age du défunt(e)</th>
                                    <th class="bb-2">Genre</th>
                                    <th class="bb-2">Lieu Décès</th>
                                    <th class="bb-2">Cause Directe</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($decladeaths as $item)
                                    <tr>
                                        <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                        <td><b><i>{{ $item->reference }}</i></b></td>
                                        <td>{{ formatDate($item->date) }}, {{$item->heure}}</td>
                                        <td>{{ $item->person }} </td>
                                        <td>{{ $item->milieu_residence }} </td>
                                        <td>{{ $item->deces_maternel }} </td>
                                        <td>{{ $item->age }} an(s) </td>
                                        <td>{{ $item->genre }} </td>
                                        <td>{{ $item->lieu }} </td>
                                        <td>{{ $item->cause_directe }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('doctor.declaration.certificat.naissance', $item->id) }}" class="btn btn-sm btn-danger" style="cursor: pointer" title="imprimer"><i
                                                    class="fa-solid fa-print"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <div>Vide...</div>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
