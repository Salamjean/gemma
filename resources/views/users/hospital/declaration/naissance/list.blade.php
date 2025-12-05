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
                                    <th class="bb-2">Photo</th>
                                    <th class="bb-2">Code patient</th>
                                    <th class="bb-2">Nom & Prenoms</th>
                                    <th class="bb-2">Genre de l'enfant</th>
                                    <th class="bb-2">Nombre</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($declarations as $item)
                                    <tr>
                                        <td>{{ $item->reference }}</td>
                                        <td>

                                                @if ($item->patient->img_url != null)
                                                    <img src="{{ asset('assets/uploads/patient/' . $item->patient->img_url) }}"
                                                        class="avatar avatar-lg rounded10" alt="Photo de profil" />
                                                @elseif ($item->patient->gender == 'masculin')
                                                    <img src="{{ asset('assets/images/avatar/6.png') }}"
                                                        class="avatar avatar-lg rounded10" alt="Photo de profil" />
                                                @elseif($item->patient->gender == 'feminin')
                                                    <img src="{{ asset('assets/images/avatar/2.png') }}"
                                                        class="avatar avatar-lg rounded10" alt="Photo de profil" />
                                                @endif

                                        </td>
                                        <td>
                                            <b>
                                                <i>

                                                        {{ $item->patient->code_patient }}

                                                </i>
                                            </b>
                                        </td>

                                        <td>

                                                {{ $item->patient->user->name }} {{ $item->patient->user->prenom }}

                                        </td>
                                        <td>

                                            {{ $item->naissance->genre }}

                                        </td>
                                        <td>{{ $item->naissance->nombre }} enfant (s)</td>
                                        <td class="text-center">
                                            <a href="{{ route('hospital.declaration.naissance.show', $item->id) }}"
                                                class="btn btn-sm btn-info" title="clique">Voir détails</a>
                                            <a href="{{ route('hospital.declaration.certificat.naissance', $item->id) }}" class="btn btn-sm btn-danger" style="cursor: pointer" title="imprimer"><i
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
