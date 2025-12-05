@extends('layouts.dashboard', ['title' => 'Recherche par assurances'])

@section('content')
    <div class="box">
        <div class="box-body">
            <div>
                <form action="{{ route('accountant.assurance.search') }}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label ">Date début</label>
                                <div class="">
                                    <input class="form-control" type="date" name="date_beging"
                                        value="{{ Illuminate\Support\Facades\Session::get('date_debut') ? Illuminate\Support\Facades\Session::get('date_debut') : date('m/d/Y') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label ">Date fin</label>
                                <div class="">
                                    <input class="form-control" type="date" name="date_end"
                                        value="{{ Illuminate\Support\Facades\Session::get('date_fin') ? Illuminate\Support\Facades\Session::get('date_fin') : date('m/d/Y') }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label ">Assurance</label>
                                <select name="assurance_id" id="assurance_id" class="form-control">
                                    <option value="" selected disabled>Selectionner</option>
                                    @foreach ($assurances as $key)
                                        <option class="search-result" value="{{ $key->id }}"> {{ $key->libelle }}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label ">Type </label>
                                <select name="type" id="type" class="form-select">
                                    <option value="" selected disabled>Selectionner</option>
                                    <option value="admission">Admission</option>
                                    <option value="hospitalisation">Hospitalisation</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group" style="margin-top: 33px;">
                                <button type="submit" class="input-group-text">Recherche <i
                                        class="fa-solid fa-search p-5"></i></button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <div class="box">
        <div class="box-body">
            @if ($data)
                <div style="display: flex; justify-content:space-between;">
                    <h4>Résultats de la recherche : <span style="color:green;"><b> {{ $data->count() }} résultats trouvés</b></span></h4>
                    <div>
                        <a href="{{ route('accountant.assurance.pdf', [Illuminate\Support\Facades\Session::get('date_debut') ?? 'empty', Illuminate\Support\Facades\Session::get('date_fin') ?? 'empty', Illuminate\Support\Facades\Session::get('assurance_id') ?? 'empty', Illuminate\Support\Facades\Session::get('type') ?? 'empty']) }}" target="_blank" class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Badge"><i class="fa-solid fa-print"></i></a>

                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Patient</th>
                                    <th>N° Assurance</th>
                                    <th>Motif consultation</th>
                                    <th>Montant consultation</th>
                                    <th>Pourcentage</th>
                                    <th>Montant patient</th>
                                    <th>Montant assurance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $result)
                                    <tr>
                                        <td>{{ dateNumberFr($result->date) }}</td>
                                        <td>{{ $result->typeAssurance->libelle ?? null}}</td>
                                        <td>{{ $result->admission->patient->user->name }} {{ $result->admission->patient->user->prenom }}</td>
                                        <td>{{ $result->admission->no_assurance ?? null }}</td>
                                        <td>{{ $result->admission->type_admission ?? null}}</td>
                                        <td>{{ $result->admission->montant_normal ?? null}} FCFA</td>
                                        <td>{{ $result->percent * 100 }}%</td>
                                        <td>{{ $result->admission->montant  ?? null}} FCFA</td>
                                        <td>{{ $result->prix }} FCFA</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box">

                    @php
                    $somConsultation = 0;
                    $somNormal = 0;
                        foreach ($data as $key => $index) {
                            $somConsultation += $index->admission->montant;
                            $somNormal += $index->admission->montant_normal;
                        }
                    @endphp
                    <div class="box-body">
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                            <div>
                                Montant assurance : <b>{{ $data->sum('prix') }} FCFA</b>
                            </div>
                            <div>
                                Montant consultation : <b>{{ $somConsultation }} FCFA</b>
                            </div>
                            <div>
                                Montant normal : <b>{{ $somNormal }} FCFA</b>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
