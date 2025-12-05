@extends('layouts.dashboard', ['title' => 'Liste des consultations'])

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title"><b>SOINS INFIRMIER DU JOUR</b></h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Code patient</th>
                            <th class="bb-2">Nom du Patient</th>
                            <th class="bb-2">Acte medicale</th>
                            <th class="bb-2">Motif</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cares as $key => $item)
                            <tr>
                                <td>
                                    <b>{{ $item->admission->patient->code_patient }}</b>
                                </td>
                                <td style="width: 0px;">
                                    {{ $item->admission->patient->user->name }}&nbsp;
                                    {{ $item->admission->patient->user->prenom }}
                                </td>
                                <td class="" style="width: 200px;">
                                    {{ $item->admission->prestationHospital->prestationService->libelle }} </td>
                                <td class="" style="width: 200px;"> {{ $item->admission->motif_consultation }} </td>

                                <td class="">
                                    @if ($item->status === 'pending')
                                        <span class="badge badge-warning">En attente</span>
                                    @elseif ($item->status === 'payment_pending')
                                        <span class="badge badge-info">En attente de paiement</span>
                                    @elseif ($item->status === 'payment_success')
                                        <span class="badge badge-danger">Issue du soins</span>
                                    @endif
                                </td>

                                <td class="text-center">

                                    @if ($item->status === 'pending')
                                        <a href="{{ route('infirmier.care.formulaire', $item->id) }}"
                                            class="btn btn-sm btn-info" title="formulaire consultation">
                                            <span class="">Commencer</span>
                                        </a>
                                    @elseif ($item->status === 'payment_pending')
                                        <a href="#" class="btn btn-sm btn-info" title="formulaire consultation">
                                            <span class="">Détail</span>
                                        </a>
                                    @elseif ($item->status === 'payment_success')
                                        <a href="#" class="btn btn-sm btn-info" title="formulaire consultation">
                                            <span class="">Continuer</span>
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
