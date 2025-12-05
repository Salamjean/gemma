@extends('layouts.dashboard')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">Agents de santé</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.doctor.add', $agent) }}" class="btn btn-success btn-md shadow">Ajouter
                                @if ($agent === 'medecin')
                                    un medécin
                                @else
                                    une sage femme
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th class="bb-2">N°</th>
                                    <th class="bb-2">Matricule</th>
                                    <th class="bb-2">Photo</th>
                                    @if ($agent === 'medecin')
                                        <th class="bb-2">Chef</th>
                                    @endif
                                    <th class="bb-2">Service</th>
                                    <th class="bb-2">Type d'agent</th>
                                    <th class="bb-2">Nom & Prénoms</th>
                                    <th class="bb-2">Contact</th>
                                    <th class="bb-2">Disponibilité</th>
                                    <th class="bb-2">Enregistré le</th>
                                    <th class="bb-2 text-center">Status</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $item)
                                    <tr>
                                        <td class="text-dark fw-bold fs-6">{{ $loop->index + 1 }}</td>
                                        <td><b>{{ $item->matricule }}</b></td>

                                        <td>
                                            @if ($item->img_url == null)
                                                <img src="{{ asset('assets/images/user2.png') }}"
                                                    class="avatar avatar-lg rounded10" alt="Photo de profil" />
                                            @else
                                                <img src="{{ asset("assets/uploads/doctor/$item->img_url") }}"
                                                    class="avatar avatar-lg rounded10" alt="Photo de profil" />
                                            @endif
                                        </td>
                                    @if ($agent === 'medecin')

                                        <td>
                                            <a href="{{ route('hospital.doctor.chief', $item->id) }}" class=" btn-md"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chief">
                                                @if ($item->typeAgent->id == 1)
                                                    @if ($item->chief == 1)
                                                        <i class="ti-check-box"
                                                            style="font-size: 25px; color:rgb(255, 153, 0);"></i>
                                                    @else
                                                        <i class="ti-control-stop" style="font-size: 22px;"></i>
                                                    @endif
                                                @endif
                                            </a>
                                        </td>
                                        @endif
                                        <td>{{ $item->serviceHospital->service->libelle }}</td>
                                        <td>
                                            {{ $item->typeAgent->libelle }}
                                            @if ($item->type_name)
                                                {{ $item->type_name }}

                                                @if ($item->typeDoctor)
                                                    ({{ $item->typeDoctor->label }})
                                                @elseif ($item->type_name == 'specialiste' && $item->gyneco == 1)
                                                    (Gynécologue)
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->contact }}
                                        </td>
                                        <td>
                                            {{ dayIndexNameString(json_decode($item->user->availability->days)) }}
                                        </td>
                                        <td>
                                            <span
                                                class="btn btn-sm btn-primary">{{ $item->created_at->format('d/m/Y H:i:s') }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status == 0)
                                                <span class="text-success">Activé</span>
                                            @else
                                                <span class="text-danger">Désactivé</span>
                                            @endif
                                        </td>
                                        <td class="text-center">


                                            <a href="{{ route('hospital.doctor.status', $item->id) }}"
                                                class="btn btn-sm {{ $item->status == 0 ? 'btn-info' : 'btn-success' }}"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail"><i
                                                    class="fa-solid {{ $item->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i></a>
                                            <a href="{{ route('hospital.doctor.show', $item->id) }}"
                                                class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Modifier"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('hospital.doctor.badge', $item->id) }}" target="_blank"
                                                class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Badge"><i
                                                    class="fa-solid fa-id-badge"></i></a>
                                            <a href="{{ route('hospital.doctor.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Supprimer"><i
                                                    class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ $empty }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
