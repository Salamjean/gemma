@extends('layouts.dashboard', ['title' => 'Liste des consultations'])

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title">Vos consultations du jour en cours</h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Reference</th>
                            <th class="bb-2">Nom du Patient</th>
                            <th class="bb-2">Motif</th>
                            <th class="bb-2 text-center">Agent traitant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $item)
                            <tr>
                                <td><b>{{ $item->patient->code_patient }}</b></td>
                                <td>
                                    <a href="{{ route('hospital.patient.detail', $item->patient->id) }}">{{ $item->patient->user->name }}&nbsp; {{ $item->patient->user->prenom }}</a>
                                </td>
                                <td class="" style="width: 200px;"> {{ $item->prestationHospital->service->libelle }} </td>
                                <td class="text-center">
                                    {{ $item->doctor->user->name }}&nbsp; {{ $item->doctor->user->prenom }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        (function($) {
            "use strict";

            $('#menu').on('click', function(e) {




            });




        })(jQuery);
    </script>
@endsection
