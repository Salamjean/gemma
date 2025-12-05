<div class="row">
    <div class="col-xl-12 col-lg-12 col-12">
        <div class="box" style="background: rgba(255, 145, 0, 0.288); padding : 10px 20px;">
            <div class="badge badge-dark" style="font-size: 20px;">CONSULTATIONS DU JOUR</div>
            <div class="box-body text-center">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="bb-2" style="text-align: left;">Heure</th>
                                <th class="bb-2">Code</th>
                                <th class="bb-2">N° dossier médical</th>
                                <th class="bb-2">Nom & prénom(s)</th>
                                <th class="bb-2">Type de la visite</th>
                                <th class="bb-2">Motif de la visite</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Consultation::orderByDESC('created_at')->where('doctor_id', \Illuminate\Support\Facades\Auth::user()->doctor->id)->where('date_consultation', date('Y-m-d'))->where('status_inf', '1')->where('status', '0')->get() as $item)
                                <tr>
                                    <td style="text-align: left;">{{ $item->created_at->format('H:i:s') }}</td>
                                    <td style="text-align: left;"><b>{{ $item->code_consultation }}</b></td>
                                    <td style="text-align: left;"><span class="fw-bold">{{ $item->patient->code_patient }}</span></td>
                                    <td style="text-align: left; text-transform: capitalize; width: 300px;">
                                        <span class="badge text-dark fw-900 fs-14">{{ $item->patient->user->name }} {{ $item->patient->user->prenom }}</span>
                                    </td>
                                    <td style="text-align: left;"><span class="badge badge-info">{{ $item->prestationHospital->prestationService->libelle }}</span></td>

                                    <td style="width: 300px;"> <span class="badge text-dark fw-900 fs-14">{{ $item->admission->motif_consultation }}</span> </td>

                                    <td class="text-center">
                                        <a href="{{ route('doctor.consultation.formulaire', $item->id) }}" class="btn btn-sm" style="background: rgba(214, 110, 62, 0.452);" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Faire la consultation">
                                            <span>Commencer</span>
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

<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <div class="badge badge-warning" style="font-size: 20px;">LISTE DE VOS CONSULTATIONS</div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                <thead>
                    <tr>
                        <th class="bb-2">Date et heure</th>
                        <th class="bb-2">Reference</th>
                        <th class="bb-2">Motif</th>
                        <th class="bb-2">Statut</th>
                        <th class="bb-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\Consultation::orderByDESC('created_at')->where('doctor_id', \Illuminate\Support\Facades\Auth::user()->doctor->id)->where('status', 1)->get() as $item)
                            <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($item->date_consultation)->format('d/m/Y') }} -
                                {{ $item->created_at->format('H:i:s') }}
                            </td>
                            <td><b>{{ $item->patient->code_patient }}</b></td>

                            <td class="" style="width: 200px;"> {{ $item->prestationHospital->prestationService->libelle }} </td>

                            <td class="">
                                @if ($item->status_inf == 0)
                                    <span class="badge badge-warning">En cours chez l'infirmier</span>
                                @elseif ($item->status == 0)
                                    <span class="badge badge-warning">En attente</span>
                                @else
                                    <span class="badge badge-success">Terminée</span> <br>
                                    <div style="padding-top: 5px;">
                                        @if ($item->ordonnance_count > 0)
                                            <a target="_blank"
                                                href="{{ route('doctor.consultation.imprimer.post', ['ordonnance', $item->ordonnance->id]) }}"><span
                                                    class="badge badge-warning">Ordonnance</span></a>
                                        @endif
                                        @if ($item->arret_count > 0)
                                            <a style="padding-bottom: 5px;" target="_blank"
                                                href="{{ route('doctor.consultation.imprimer.post', ['arret', $item->arret->id]) }}"><span
                                                    class="badge badge-primary">Arret de travail</span></a>
                                        @endif
                                        @if ($item->examen_count > 0)
                                            <a target="_blank"
                                                href="{{ route('doctor.consultation.imprimer.post', ['examen', $item->examen->id]) }}"><span
                                                    class="badge badge-secondary">Bulletin d'examen</span></a>
                                        @endif
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">

                                @if ($item->status == 0 || $item->status_inf == 0)
                                    <a href="{{ route('doctor.consultation.info', $item->id) }}" class="btn btn-sm btn-info" title="info">
                                        <span class="">Info patient</span>
                                    </a>
                                @else
                                    <a href="{{ route('doctor.consultation.detail', $item->id) }}" class="btn btn-sm btn-info" title="detail consultation">
                                        <span class="">Détail</span>
                                    </a>
                                    <a href="{{ route('doctor.patient.dossier_medical', $item->patient->id) }}" class="btn btn-sm" style="background: rgba(234, 23, 97, 0.452);" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Consulter le dossier médical">
                                        <span>Dossier Médical</span>
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
</div>
