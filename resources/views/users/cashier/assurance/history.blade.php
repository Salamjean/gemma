@extends('layouts.dashboard', ['title' => 'Historique des assurances validées'])

@section('content')
    <div class="row">
        <div class="col-12  ">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-12  col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <h4 class="box-title">Historique des assurances </h4>
                        </div>
                    </div>
                </div>
                <br /><br />
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                            <thead class="bg-info">
                                <tr>
                                    <th class="bb-2">Date</th>
                                    <th class="bb-2">Ref Patient</th>
                                    <th class="bb-2">Type</th>
                                    <th class="bb-2">Nom du Patient</th>
                                    <th class="bb-2">Type d'assurance</th>
                                    <th class="bb-2">Pourcentage d'assurance</th>
                                    <th class="bb-2">Montant normal</th>
                                    <th class="bb-2">Montant assurance </th>
                                    <th class="bb-2">Montant patient</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($assurances as $item)
                                    <tr>
                                        <td><b>{{ dateNumberFr($item->created_at) }}</b></td>
                                        <td>
                                            <i>{{ $item->patient->code_patient }}
                                        </td>
                                        <td>
                                            <i>{{ $item->type }}
                                        </td>
                                        <td>
                                            <i>{{ $item->patient->user->name }} {{ $item->patient->user->prenom }}</i>
                                        </td>


                                        <td>
                                            {{ $item->typeAssurance->libelle }}
                                        </td>
                                        <td>
                                            {{ $item->typeAssurance->reduction * 100 }}%
                                        </td>
                                        <td>
                                            {{  $item->payment->prix_normal }} FCFA
                                        </td>
                                        <td>
                                            {{ $item->prix }} FCFA
                                        </td>
                                        <td>
                                            {{ $item->payment->prix }} FCFA
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
