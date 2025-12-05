@extends('layouts.dashboard', ['title' => 'Liste de vos recettes collectées' ])

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                        <div>
                        <a href="{{ route('cashier.recette.pdf', date('Y-m-d')) }}" class="btn btn-info" target="_blank"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Imprimer recette du jour">
                                        <i class="fa fa-print"></i>
                                    </a>
        </div></br>
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Jour</th>
                            <th class="bb-2">Nombre de consultations</th>
                            <th class="bb-2">Somme collectée</th>
                           
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
                                    {{ $item->somme }} F cfa
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
