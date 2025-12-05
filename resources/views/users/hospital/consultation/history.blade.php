    @extends('layouts.dashboard', ['title' => 'Historique de consultations'])

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title">Consultations du jour en cours</h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Date et heure</th>
                            <th class="bb-2">Reference</th>
                            <th class="bb-2">Motif</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $item)
                            <tr>
                                <td>
                                   {{ \Carbon\Carbon::parse($item->date_consultation)->format('d/m/Y') }} -
                                    {{ heureFr($item->created_at) }}
                                </td>
                                <td><b>{{ $item->patient->code_patient }}</b></td>

                                <td class="" style="width: 200px;"> {{ $item->prestationHospital->service->libelle ?? null}} </td>

                                <td class="">
                                   @if ($item->status == 0)
                                        <span class="badge badge-danger">Annulée</span>
                                    @else
                                        <span class="badge badge-success">Terminée</span> <br>
                                        <div style="padding-top: 5px;">
                                            @if ($item->ordonnance_count > 0)
                                                <a target="_blank"
                                                    href="{{ route('hospital.consultation.imprimer.post', ['ordonnance', $item->ordonnance->id]) }}"><span
                                                        class="badge badge-warning">Ordonnance</span></a>
                                            @endif
                                            @if ($item->arret_count > 0)
                                                <a style="padding-bottom: 5px;" target="_blank"
                                                    href="{{ route('hospital.consultation.imprimer.post', ['arret', $item->arret->id]) }}"><span
                                                        class="badge badge-primary">Arret de travail</span></a>
                                            @endif
                                            @if ($item->examen_count > 0)
                                                <a target="_blank"
                                                    href="{{ route('hospital.consultation.imprimer.post', ['examen', $item->examen->id]) }}"><span
                                                        class="badge badge-secondary">Bulletin d'examen</span></a>
                                            @endif
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status == 0)
                                        <a href="{{ route('hospital.patient.detail', $item->patient->id) }}" class="btn btn-sm btn-info" title="info">
                                            <span class="">Info patient</span>
                                        </a>
                                    @else
                                        <a href="{{ route('hospital.consultation.detail', $item->id) }}" class="btn btn-sm btn-info" title="detail consultation">
                                            <span class="">Détail</span>
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
