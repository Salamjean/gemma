@extends('layouts.dashboard', ['title' => 'Barre de recherche'])

@section('content')
    <div class="box">
        <div class="box-body">
            <div>
                <form action="{{ route('accountant.search.treatment') }}" method="get">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label ">Date début</label>
                                <div class="">
                                    <input class="form-control" type="date" name="date_beging" value="{{ Illuminate\Support\Facades\Session::get('date_debut') ? Illuminate\Support\Facades\Session::get('date_debut') : date('m/d/Y') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="col-form-label ">Date fin</label>
                                <div class="">
                                    <input class="form-control" type="date" name="date_end" value="{{ Illuminate\Support\Facades\Session::get('date_fin') ? Illuminate\Support\Facades\Session::get('date_fin') : date('m/d/Y') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label ">Caissière</label>
                                <select name="caissiere_id" id="caissiere_id" class="form-control">
                                    <option value="" selected disabled>Selectionner</option>
                                    @foreach ($cashiers as $key)
                                        <option class="search-result" value="{{ $key->id }}"> {{ $key->user->name }}
                                            {{ $key->user->prenom }}</option>
                                    @endforeach
                                </select>
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
                        <div class="col-md-1">
                            <div class="form-group" style="margin-top: 33px;">
                                <button type="submit" class="input-group-text" style="">Recherche <i
                                        class="fa-solid fa-search" style="margin-left: 40px;"></i></button>
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
                <h4>Résultats de la recherche :</h4>
                <ul>
                    @foreach ($data as $result)
                        <li>{{ $result->code_admission }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
