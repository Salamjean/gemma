@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.bedroom.index') }}" class="btn btn-primary btn-md shadow">Retour à la
                                liste</a>
                        </div>
                    </div>
                </div>
                <div class="box-body fs-14">
                    <h4 class="box-title text-primary mb-0"><i class="ti-list me-15"></i> Informations </h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-12 py-10" style="position: relative;">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-label"><strong>N° de la chambre :</strong> <span
                                            style="color:red;">{{ $bedroom->number }}</span></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-label">
                                        <strong>Nombre de chambre :</strong>
                                        {{ count($bedroom->beds) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-label"><strong>Description :</strong> {{ $bedroom->description }}</div>
                                </div><br><br><br>
                            </div>
                            @if ($bedroom == 'collective')
                                <div style="position: absolute; top:30px; right:30px;">
                                    <div style="display: flex; gap:5px;">
                                        <div id="editData"
                                            style="border-radius: 200px; background-color:rgb(0, 162, 255); padding:10px; cursor: pointer;">
                                            <span class="fa-solid fa-edit fa-2x text-white"></span>
                                        </div>
                                        <div id="addData"
                                            style="border-radius: 200px; background-color:rgb(255, 174, 0); padding:10px; cursor: pointer;">
                                            <span class="fa-solid fa-add fa-2x text-white"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- data bed in bedroom --}}
                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <tbody>

                                @foreach ($bedroom->beds as $item)
                                    <tr>
                                        <th>Lit - N° {{ $item->number }}</th>

                                        <td>
                                            {{ $item->price }} FCFA
                                        </td>
                                        <td class="text-center">
                                                @if ($item->status_occupied == 'occupied')
                                                    <span class="text-success">Occupé</span>
                                                @else
                                                    <span class="text-danger">Non occupé</span>
                                                    <a href="{{ route('hospital.bedroom.bed.delete', $item->id) }}">
                                                        <span class="fa fa-trash mx-10" style="cursor: pointer;">
                                                        </span>
                                                    </a>
                                                @endif



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @if ($bedroom == 'collective')
                        {{-- form update bedroom --}}
                        <form id="bedroomUpdate" class="form"
                            action="{{ route('hospital.bedroom.update', $bedroom->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <h4 class="box-title text-success mb-0"> Infos Chambre</h4>

                                <hr class="my-15">
                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="number" class="form-label">N° de chambre<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="number" name="number"
                                                value="{{ $bedroom->number }}"
                                                class="form-control @error('number') is-invalid @enderror" required
                                                autocomplete="number" autofocus placeholder="Numéro">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="form-label"> <b>Nombre de lit : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">

                                                <input type="number" name="nbbb" value="{{ count($bedroom->beds) }}"
                                                    id="fddd" class="form-control" min="1" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" class="form-label">Prix : <span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="price" name="number"
                                                value="{{ $bedroom->price }}"
                                                class="form-control @error('price') is-invalid @enderror" required
                                                autocomplete="price" autofocus placeholder="Numéro">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                autocomplete="description" autofocus value="{{ $bedroom->description }}"
                                                placeholder="Bref description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h4 class="box-title text-success mb-0 pt-10"> Modifier les données des lits de chambre
                                    </h4>
                                    <hr class="my-15">
                                    @foreach ($bedroom->beds as $key => $item)
                                        <div class="row" style="margin-bottom:30px;">
                                            <div class="col-md-6">
                                                <div class="ribbon ribbon-dark"
                                                    style="margin-bottom: 5px; margin-top: 5px; padding:6px; background-color:rgb(79, 180, 238); max-width:200px;">
                                                    Lit n°{{ $key + 1 }}</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="genre" class="form-label">
                                                        <b>N° du lit : <span class="danger">* </span> </b>
                                                    </label>
                                                    <input type="number" name="bedNumberU{{ $key }}"
                                                        id="bedNumberU{{ $key }}" class="form-control"
                                                        value="{{ $item->number }}" min="1" required>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="box-footer text-end">
                                <button type="reset" class="btn btn-warning me-1">
                                    <i class="ti-trash"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Modifier
                                </button>
                            </div>
                        </form>

                        {{-- form add bed --}}
                        <form id="bedStore" class="form"
                            action="{{ route('hospital.bedroom.bed.store', $bedroom->id) }}" method="post">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-success mb-0 pt-10"> Ajout de nouveau de chambre</h4>

                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="heure" class="form-label"> <b>Nombre de nouveau lit : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="nbBed" value="0" id="nbBed"
                                                    class="form-control" min="1" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container__bed">

                                </div>
                            </div>
                            <div class="box-footer text-end">
                                <button type="reset" class="btn btn-warning me-1">
                                    <i class="ti-trash"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Enregister
                                </button>
                            </div>
                        </form>
                    @else
                    @endif
                </div>


            </div>

        </div>
    </div>
    <!-- /.box -->
    </div>

    <script>
        (function($) {
            "use strict";

            $("#bedroomUpdate").css("display", "none");
            $("#bedStore").css("display", "none");

            $('#addData').on('click', function() {

                $("#bedroomUpdate").css("display", "none");
                $("#bedStore").css("display", "block");



            })

            $('#editData').on('click', function() {

                $("#bedStore").css("display", "none");
                $("#bedroomUpdate").css("display", "block");


            })

            $('#nbBed').on('input', function() {
                const value = parseInt($(this).val());

                if (value > 0) {
                    $(".container__bed").empty();

                    for (var i = 0; i < value; i++) {
                        $(".container__bed").append(`<div class="row" style="margin-bottom:30px;">
                <div class="col-md-12">
                    <div class="ribbon ribbon-dark" style="margin-bottom: 5px; margin-top: 10px; padding:6px; background-color:orange; max-width:200px;">Lit n°${i+1}</div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="genre" class="form-label">
                            <b>Numéro du lit : <span class="danger">* </span> </b>
                        </label>
                        <input type="number" name="bedNumber${i}" id="bedNumber${i}" class="form-control" min="1" required>
                    </div>
                </div>
            </div>`);
                    }
                } else {
                    $(".container__bed").empty();
                }
            });


        })(jQuery);
    </script>
@endsection
