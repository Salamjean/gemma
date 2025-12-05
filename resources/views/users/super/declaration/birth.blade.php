@extends('layouts.dashboard', ['title' => 'Liste des declarations de naissance'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div style="display:flex; justify-content: space-between;">
                        <div class="">
                            <h4 class="box-title">DECLARATION DE NAISSANCE</h4>
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
                                    <th class="bb-2">Lieu Accouchement</th>
                                    <th class="bb-2">Nombre</th>
                                    <th class="bb-2">Etat</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($declabirths as $declabirth)
                                    <tr>
                                        <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                        <td><b><i>{{ $declabirth->reference }}</i></b></td>
                                        <td>{{ formatDate($declabirth->date) }}, {{ $declabirth->heure }}</td>
                                        <td>{{ $declabirth->lieu }} </td>
                                        <td> {{ $declabirth->nombre }} enfant (s)</td>
                                        <td>{{ $declabirth->nee }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('doctor.declaration.certificat.naissance', $declabirth->id) }}" class="btn btn-sm btn-danger" style="cursor: pointer" title="imprimer"><i
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
