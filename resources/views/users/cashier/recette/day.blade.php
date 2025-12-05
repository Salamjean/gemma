@extends('layouts.dashboard', ['title' => 'La recette du ' . dateCompletFr($day)])

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <table id="example3" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Jours</th>
                            <th class="bb-2">Somme collectée</th>
                        </tr>
                    </thead>
                    <tbody>

                            <tr>
                                <td><b>{{ date('d-m-Y') }}</b></td>

                                @php
                                $sum = 0;
                                $sum_a = 0;
                                    foreach ($admissions as $key => $value) {
                                        $sum += $value->prix;
                                        $sum_a += $value->prix_normal - $value->prix;
                                    }
                                @endphp
                                <td class="text-center">
                                    {{ $sum }} F cfa
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
