@extends('layouts.dashboard', ['title' => 'Liste des declarations de décès'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div style="display:flex; justify-content: space-between;">
                        <div class="">
                            <h4 class="box-title">DECLARATION DE DECES</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('doctor.declaration.deces.add', 'patient') }}"
                                class="btn btn-primary btn-md shadow">Ajout de declaration de décès (Patient)</a>
                                <a href="{{ route('doctor.declaration.deces.add', 'enfant') }}"
                                class="btn btn-primary btn-md shadow">Ajout de declaration de décès (Nouveau née)</a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th class="bb-2">N°</th>
                                    <th class="bb-2">Personne concernée</th>
                                    <th class="bb-2">Code patient</th>
                                    <th class="bb-2">Photo</th>
                                    <th class="bb-2">Nom & Prenoms</th>
                                    <th class="bb-2">Genre</th>
                                    <th class="bb-2">Age</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($declarations as $item)
                                    <tr>
                                        <td>{{ $item->reference }}</td>
                                        <td>

                                            @if ($item->deces->person == 'patient')
                                                Patient
                                            @else
                                                Nouveau née
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
                                                {{ $item->patient->user->name }} {{ $item->patient->user->prenom }}

                                        </td>
                                        <td>

                                            {{ $item->deces->genre }}

                                        </td>
                                        <td>{{ $item->deces->age }} ans</td>
                                        <td class="text-center">
                                            <a href="{{ route('doctor.declaration.deces.show', $item->id) }}"
                                                class="btn btn-sm btn-info" title="clique">Voir détails</a>
                                            <a target="_blank" href="{{ route('doctor.declaration.certificat.deces', $item->id) }}" class="btn btn-sm btn-danger" style="cursor: pointer" title="imprimer"><i
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
