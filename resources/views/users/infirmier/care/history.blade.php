@extends('layouts.dashboard', ['title' => 'Liste des consultations'])

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <h4 class="box-title"><b>HISTORIQUE DES SOINS INFIRMIER</b></h4>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="box-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                    <thead>
                        <tr>
                            <th class="bb-2">Date</th>
                            <th class="bb-2">Code patient</th>
                            <th class="bb-2">Nom du Patient</th>
                            <th class="bb-2">Motif</th>
                            <th class="bb-2">Status</th>
                            <th class="bb-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cares as $key => $item)
                            <tr>
                                <td>
                                    {{ $item->created_at->format('d/m/Y') }}
                                </td>
                                <td><b>{{ $item->admission->patient->code_patient }}</b></td>
                                <td>
                                    {{ $item->admission->patient->user->name }}
                                    {{ $item->admission->patient->user->prenom }}
                                </td>
                                <td class="" style="width: 200px;"> {{ $item->admission->motif_consultation }} </td>

                                <td class="">
                                    @if ($item->status === 'pending')
                                        <span class="badge badge-danger">Annulé</span>
                                    @elseif ($item->status === 'payment_pending')
                                        <span class="badge badge-danger">Annulé|Produit non payé</span>
                                    @elseif ($item->status === 'payment_success')
                                        <span class="badge badge-danger">Annulé|Produit payé</span>
                                    @elseif ($item->status === 'success')
                                        <span class="badge badge-success">Succès</span>
                                    @endif
                                </td>

                                <td class="text-center">

                                    @if ($item->status === 'pending')
                                        <a href="#" class="btn btn-sm btn-info" title="detail consultation">
                                            <span class="">Info patient</span>
                                        </a>
                                    @elseif ($item->status === 'payment_pending')
                                        <a href="{{ route('infirmier.care.detail', $item->id) }}" class="btn btn-sm btn-info" title="detail consultation">
                                            <span class="">Détail</span>
                                        </a>
                                    @elseif ($item->status === 'payment_success')
                                        <a href="{{ route('infirmier.care.payment_success', $item->id) }}" class="btn btn-sm btn-info" title="detail consultation">
                                            <span class="">Continuer</span>
                                        </a>
                                    @elseif ($item->status === 'success')
                                        <a href="{{ route('infirmier.care.detail', $item->id) }}" class="btn btn-sm btn-info" title="detail consultation">
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
