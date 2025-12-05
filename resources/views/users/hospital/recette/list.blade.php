@extends('layouts.dashboard', ['title' => 'Liste de vos recettes collectées' ])

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Jour</th>
                            <th class="bb-2">Nombre de consultations</th>
                            <th class="bb-2">Somme collectée</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $item)
                            <tr>
                                <td><b>{{ dateCompletFr($item->jour) }}</b></td>
                                <td class="text-center">
                                    {{ $item->nb }}
                                </td>
                                <td class="text-center">
                                    {{ $item->somme }} Fr
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('hospital.recette.day', $item->jour) }}" class="btn btn-info"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom">Voir détail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
