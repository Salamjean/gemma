@extends('layouts.dashboard', ['title' => "Liste des patients en Hospitalisation"])

@section('content')
    <div class="box">

        <div class="box-body">
            <div class="row">
        <div class="col-12  ">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <h4 class="box-title">Ordonnances</h4>
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead class="bg-info">
                                <tr>
                                    <th class="bb-2">Date</th>
                                    <th class="bb-2">Reference</th>
                                    <th class="bb-2">Type</th>
                                    <th class="bb-2">Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($consultation->ordonnances as $ordonnance)
                                    <tr>
                                        <td><b>{{ dateNumberFr($ordonnance->created_at) }} à {{ heureFr($ordonnance->created_at) }}</b></td>
                                        <td>
                                            <i>{{ $ordonnance->reference }}</i>
                                        </td>
                                        <td>
                                            {{ $ordonnance->type }}
                                        </td>
                                        <td>
                                            <a href="{{ route('consultation.imprimer.post', ['ordonnance', $ordonnance->id]) }}">
                                                <i class="fa-solid fa-print fa-2x"></i>
                                            </a>
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
        </div>
    </div>
@endsection
