@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.type.examen.index') }}" class="btn btn-primary btn-md shadow">Retour à la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body fs-14">
                    <h4 class="box-title text-primary mb-0"><i class="fa-solid fa-building-user"></i> Informations | <span class="text-lowercase" style="color:brown;">{{ $type->libelle }}</span></h4>
                    <hr class="my-15">
                    <div class="row">


                        <div class="col-md-9 py-10">
                            <div class="form-label"><strong>Référence :</strong> {{ $type->reference }}</div>
                            <div class="form-label"><strong>Libelle :</strong> {{ $type->libelle }}</div><br>
                            <div class="form-label"><strong>Description :</strong> {{ $type->libelle }}</div><br>
                            <div class="form-label"><strong>Prix :</strong> {{ $type->prix }} FCFA</div><br>
                            <h4 class="box-title text-success pt-10"><i class="ti-pencil me-15"></i> Modifier les données </h4>
                            <hr class="my-0"><br>
                            <form class="form" action="{{ route('hospital.type.examen.update', $type->id) }}" method="post" >
                                @csrf
                                @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="libelle" class="form-label">Libelle<span class="text-danger fw-bold">*</span></label>
                                                <input type="text" id="libelle" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ $type->libelle }}" required autocomplete="libelle" autofocus placeholder="Description">
                                                @error('libelle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Description<span class="text-danger fw-bold"></span></label>
                                                <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $type->description }}" autocomplete="description" autofocus placeholder="Description">
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="prix" class="form-label">Prix<span class="text-danger fw-bold">*</span></label>
                                                <input type="number" id="prix" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ $type->prix }}" required autocomplete="prix" autofocus placeholder="Description">
                                                @error('prix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-end">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Modifier
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

