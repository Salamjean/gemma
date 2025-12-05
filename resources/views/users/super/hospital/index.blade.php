@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">Hopital</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('super.hospital.add') }}" class="btn btn-success btn-md shadow">Ajouter un hopital</a>
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
                                <th class="bb-2">Reference</th>
                                <th class="bb-2">Hopital</th>
                                <th class="bb-2">Contact</th>
                                <th class="bb-2">Crée le</th>
                                <th class="bb-2 text-center">Statut</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($hospitals as $item)
                                <tr>
                                    <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if($item->img_url == null)
                                            <img src="{{ asset('assets/uploads/hospital.gif') }}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                        @else
                                            <img src="{{ asset("assets/uploads/hospital/$item->img_url")}}" class="avatar avatar-lg rounded10" alt="Photo de profil"/>
                                        @endif
                                    </td>
                                    <td>{{ $item->reference }}</td>
                                    <td>
                                        {{ $item->label }}
                                    </td>
                                    <td>
                                        {{ $item->contact }}
                                    </td>
                                    <td>
                                        <span class="btn btn-sm btn-primary">{{ $item->created_at->format('d/m/Y - H:i:s') }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 0)
                                            <span class="text-success">Activé</span>
                                        @else
                                            <span class="text-danger">Désactivé</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('super.hospital.status',$item->id) }}" class="btn btn-sm {{ $item->status == 0 ? 'btn-success' : 'btn-danger' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Activer/Désactiver"><i class="fa-solid {{ $item->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i></a>
                                        <a href="{{ route('super.hospital.show',$item->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('super.hospital.report' ,$item->id)}}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Consulter Infos"><i class="fa-solid fa-list-alt"></i></a>
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

