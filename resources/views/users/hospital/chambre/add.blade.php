@extends('layouts.dashboard')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT D'UNE CHAMBRE</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.bedroom.index') }}" class="btn btn-success btn-md shadow">Liste des
                                chambres</a>
                        </div>
                    </div>
                </div>

                @if ($type == 'collective')
                    <div class="container__bedroom">
                        <form class="form" action="{{ route('hospital.bedroom.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-success mb-0"> Infos Chambre</h4>

                                <hr class="my-15">
                                <div class="row">
                                    <input type="hidden" name="type" value="1" />
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="number" class="form-label">N° de chambre<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="number" name="number"
                                                class="form-control @error('number') is-invalid @enderror"
                                                value="{{ old('number') }}" required autocomplete="number" autofocus
                                                placeholder="Numéro">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="heure" class="form-label"> <b>Nombre de lit : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">

                                                <input type="number" name="nbBed" id="nbBed" class="form-control" min="1"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" class="form-label"> <b>Prix :
                                                </b><span class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="price" id="price" class="form-control" min="1"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                value="{{ old('description') }}" autocomplete="description" autofocus
                                                placeholder="Bref description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h4 class="box-title text-success mb-0 pt-10"> Infos lit dans la chambre</h4>
                                    <hr class="my-15">
                                    <div class="container__bed">

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-end">
                                <button type="button" class="btn btn-warning me-1" onclick="history.back()">
                                    <i class="ti-arrow-left"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Enregister
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="container__bedroom">
                        <form class="form" action="{{ route('hospital.bedroom.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <h4 class="box-title text-success mb-0"> Infos Chambre</h4>

                                <hr class="my-15">
                                <div class="row">
                                    <input type="hidden" name="type" value="0" />
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="number" class="form-label">N° de chambre<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="number" name="number"
                                                class="form-control @error('number') is-invalid @enderror"
                                                value="{{ old('number') }}" required autocomplete="number" autofocus
                                                placeholder="Numéro">
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="bedNumber" id="bedNumber0" class="form-control" min="0" value="1"
                                        required>
                                    <input type="hidden" name="nbBed" id="nbBed" value="1" class="form-control" min="1">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" class="form-label"> <b>Prix :
                                                </b><span class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="number" name="price" id="price" class="form-control" min="1"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                value="{{ old('description') }}" autocomplete="description" autofocus
                                                placeholder="Bref description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <h4 class="box-title text-success mb-0 pt-10"> Infos lit dans la chambre</h4>
                                    <hr class="my-15">
                                    <div class="container__bed">

                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-end">
                                <button type="button" class="btn btn-warning me-1" onclick="history.back()">
                                    <i class="ti-arrow-left"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti-save-alt"></i> Enregister
                                </button>
                            </div>
                        </form>
                    </div>
                @endif



            </div>
        </div>
        <script>
            (function ($) {
                "use strict";


                $('#nbBed').on('input', function () {
                    const value = parseInt($(this).val());

                    if (value > 0) {
                        $(".container__bed").empty();

                        for (var i = 0; i < value; i++) {
                            $(".container__bed").append(`<div class="row" style="margin-bottom:30px;">
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="ribbon ribbon-dark" style="margin-bottom: 5px; margin-top: 10px; padding:6px; background-color:orange; width:100%;">Lit n°${i + 1}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="genre" class="form-label">
                                    <b>Numéro du lit : <span class="danger">* </span> </b>
                                </label>
                                <input type="number" name="bedNumber${i}" id="bedNumber${i}" class="form-control" min="1" required>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>`);
                        }
                    } else {
                        $(".container__bed").empty();
                    }
                });


            })(jQuery);
        </script>
@endsection