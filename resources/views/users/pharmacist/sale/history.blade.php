@extends('layouts.dashboard', ['title' => 'Paiement en cours'])
@section('content')
    <div class="row">
        <div class="col-12  ">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <h4 class="box-title"><b>HISTORIQUE DE PAIEMENT</b></h4>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="bb-2">Date</th>
                                    <th class="bb-2">Code Patient</th>
                                    <th class="bb-2">Type</th>
                                    <th class="bb-2">Motif</th>
                                    <th class="bb-2">Nom du Patient</th>
                                    <th class="bb-2">Montant</th>
                                    <th class="bb-2">Document</th>
                                    <th class="bb-2 text-center">Status</th>
                                    <th class="bb-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($payments as $item)
                                    <tr>
                                        <td>
                                            <i>{{ dateNumberFr($item->created_at) }}</i>

                                        </td>
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
                                            <i>{{ $item->price }} Fcfa</i>

                                        </td>
                                        <td class="text-center">
                                            @if ($item->status === 'success')
                                                <a href="{{ route('pharmacy.payment.payImpression', $item->id) }}">
                                                    <span class="p-1 badge-dark rounded-3">
                                                        Facture
                                                    </span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status === 'pending')
                                                <span class="p-1 badge-danger rounded-3">
                                                    Annulé
                                                </span>
                                            @elseif ($item->status === 'success')
                                                <span class="p-1 badge-success rounded-3">
                                                    Succès
                                                </span>
                                            @endif

                                        </td>

                                        <td class="text-center">
                                            @if ($item->status == 'pending')
                                                <a class="btn btn-sm btn-danger" href="#" style="cursor: pointer"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Valider">
                                                    Patient
                                                </a>
                                            @elseif ($item->status === 'success')
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('pharmacy.payment.detail', $item->id) }}"
                                                    style="cursor: pointer" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Valider">
                                                    Détail
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
@endsection
