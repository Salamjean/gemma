@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">TYPES DE MEDECINS</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.type.doctor.add') }}" class="btn btn-success btn-md shadow">Ajouter type de Medecin</a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                            <tr>
                                <th class="bb-2">N°</th>
                                <th class="bb-2">Libelle</th>
                                <th class="bb-2 text-center">Status</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($type as $item)
                                <tr>
                                    <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $item->label }}
                                    </td>

                                    <td class="text-center">
                                        @if($item->status == 0)
                                            <span class="text-success">Activé</span>
                                        @else
                                            <span class="text-danger">Désactivé</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('hospital.type.doctor.status',$item->id) }}" class="btn btn-sm {{ $item->status == 0 ? 'btn-info' : 'btn-success' }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail"><i class="fa-solid {{ $item->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i></a>
                                        <a href="{{ route('hospital.type.doctor.show',$item->id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                                <a href="{{ route('hospital.type.doctor.delete',$item->id) }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Supprimer"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

