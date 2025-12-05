@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <h4 class="box-title">Declarations de décès</h4>
                        </div>

                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                            <tr>
                                <th class="bb-2">N°</th>
                                <th class="bb-2">Date</th>
                                <th class="bb-2">Medecin</th>
                                <th class="bb-2">Nom du patient</th>
                                <th class="bb-2">Date de décès</th>
                                <th class="bb-2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-dark fw-bold fs-6">#{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ dateFr($item->created_at) }}
                                    </td>
                                    <td>
                                        {{ $item->doctor->user->name }}
                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ dateFr($item->date_deces) }}
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail"><i class="fa-solid fa-eye"></i></a>
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
