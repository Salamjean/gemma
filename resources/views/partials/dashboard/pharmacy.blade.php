<div class="row">
    <div class="col-xl-4 col-lg-4 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_money.png') }}" class="" alt="icon">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-900 text-success fs-24">
                            {{ $sum }}
                            FCFA</h2>

                        <p class="text-fade mt-5 mb-0 text-success">Somme perçue (journée)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-4 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_valid.png') }}" class="" alt="aa">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">
                            {{ count($payments_pending) }}
                        </h2>
                        <p class="text-fade mt-5 mb-0 text-success">Paiement en Attente</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_valid.png') }}" class="" alt="aa">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">
                            0
                        </h2>
                        <p class="text-fade mt-5 mb-0 text-success">Paiement en validé</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="row">
    <div class="col-12  ">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-xs-12  d-flex justify-content-between">
                        <h4 class="box-title"><b>PAIEMENT EN ATTENTE</b></h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <a
                                href="{{ route('pharmacy.payment.indicate') }}"
                                target="_blank"
                            >
                                <span class="fa-solid fa-print  fa-2x"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                        <thead class="bg-primary">
                            <tr>
                                <th class="bb-2">Code Patient</th>
                                <th class="bb-2">Type</th>
                                <th class="bb-2">Motif</th>
                                <th class="bb-2">Nom du Patient</th>
                                <th class="bb-2">Montant</th>
                                <th class="bb-2 text-center">Status</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payments_pending as $item)
                                    <tr>
                                        <td><b>

                                            @if ($item->type == 'care_requested')
                                                {{ $item->careRequested->admission->patient->code_patient }}
                                            @elseif($item->type == 'ordonnance')
                                                {{ $item->ordonnance->consultation->patient->code_patient }}
                                            @elseif ($item->type == 'hospitalisation')
                                                {{ $item->hospitalisationDrugRequested->hospitalisation->consultation->patient->code_patient }}
                                            @endif
                                        </b></td>
                                        <td>{{ grudSaleType($item->type) }}</td>
                                        <td>
                                            @if ($item->type == 'care_requested')
                                                {{ $item->careRequested->admission->prestationHospital->prestationService->libelle }}
                                            @elseif($item->type == 'ordonnance')
                                                Ordonnance
                                            @elseif ($item->type == 'hospitalisation')
                                                Hospitalisation
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->type == 'care_requested')
                                                <i>{{ $item->careRequested->admission->patient->user->name }}&nbsp;
                                                {{ $item->careRequested->admission->patient->user->prenom }}</i>
                                            @elseif($item->type == 'ordonnance')
                                                <i>{{ $item->ordonnance->consultation->patient->user->name }}&nbsp;
                                                {{ $item->ordonnance->consultation->patient->user->prenom }}</i>
                                            @elseif ($item->type == 'hospitalisation')
                                                <i>{{ $item->hospitalisationDrugRequested->hospitalisation->consultation->patient->user->name }}&nbsp;
                                                {{ $item->hospitalisationDrugRequested->hospitalisation->consultation->patient->user->prenom }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            <i>{{ $item->price }} FCFA</i>

                                        </td>
                                        <td class="text-center">
                                            <span class="p-1 badge-warning rounded-3">
                                                En attente
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status == 'pending')
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('pharmacy.payment.show', $item->id) }}"
                                                    style="cursor: pointer" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Valider">
                                                    Procéder au paiement
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
</div>
