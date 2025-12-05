@extends('layouts.dashboard', ['title' => 'Liste de vos recettes collectées'])

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <div>

                </div></br>
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Jour</th>
                            <th class="bb-2">Nombre de consultations</th>
                            <th class="bb-2">Somme collectée</th>
                            <th class="bb-2">Imprimer</th>

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
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('cashier.admission.indicate', $item->jour) }}" target="_blank">
                                            <span class="fa-solid fa-print  fa-2x"></span>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
