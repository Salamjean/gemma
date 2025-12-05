@extends('layouts.dashboard', ['title' => "Liste des médicaments"])

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h4 class="box-title">Pharmacie</h4>
                    </div>
                    <div class="">
                        <a href="{{ route('pharmacy.drug.create') }}" class="btn btn-success btn-md shadow">Ajouter un
                            nouveau médicament</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                        <thead>
                            <tr>
                                <th class="bb-2">N°</th>
                                <th class="bb-2">Code</th>
                                <th class="bb-2">Désignation Médicament</th>
                                <th class="bb-2">Quantité</th>
                                <th class="bb-2 text-center">Prix (Fcfa)</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($drugs as $item)
                            <tr>
                                <td class="text-dark fw-bold fs-6">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->drug->code }}</td>
                                <td>{{ $item->drug->name }}</td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    {{ number_format($item->price, null, 0, ' ') }}
                                </td>
                                <td class="text-center">
                                    {{-- <a href="{{ route('super.hospital.status',$item->id) }}"
                                        class="btn btn-sm {{ $item->status == 0 ? 'btn-info' : 'btn-success' }}"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail"><i
                                            class="fa-solid {{ $item->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i></a> --}}
                                    <a href="{{ route('pharmacy.drug.edit',$item->id) }}"
                                        class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Modifier"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route('pharmacy.drug.destroy',$item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Supprimer"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">Aucune données Enregistrées</td>
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
