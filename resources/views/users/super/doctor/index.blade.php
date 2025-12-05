@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">Medecins</h4>
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
                                <th class="bb-2">Service</th>
                                <th class="bb-2">Type de medecin</th>
                                <th class="bb-2">Matricule</th>
                                <th class="bb-2">Nom & Prénoms</th>
                                <th class="bb-2">Contact</th>
                                <th class="bb-2 text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($doctors as $item)
                                <tr>
                                    <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if($item->img_url == null)
                                            <img src="{{ asset('assets/uploads/doctor.png') }}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                        @else
                                            <img src="{{ asset("assets/uploads/doctor/$item->img_url")}}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                        @endif
                                    </td>
                                    <td>{{ $item->departement->libelle }}</td>
                                    <td>{{ $item->typeDoctor->label ?? null }}</td>
                                    <td>{{ $item->matricule }}</td>
                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                    <td>
                                        {{ $item->contact }}
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 0)
                                            <span class="text-success">Activé</span>
                                        @else
                                            <span class="text-danger">Désactivé</span>
                                        @endif
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
