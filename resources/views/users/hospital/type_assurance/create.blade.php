@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT D'UNE ASSURANCE</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.type.assurance.index') }}" class="btn btn-success btn-md shadow">Liste des assurances</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('hospital.type.assurance.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-success mb-0"><i class="ti-user me-15"></i>Infos sur l'assurance</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle" class="form-label">Libelle<span class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="libelle" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus placeholder="Libelle de l'assurance">
                                    @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reduction" class="form-label">Pourcentage<span class="text-danger fw-bold">*</span></label>
                                    <input type="number" id="reduction" name="reduction" class="form-control @error('reduction') is-invalid @enderror" value="{{ old('reduction') }}" required autocomplete="reduction" autofocus placeholder="Pourcentage de reduction de l'assurance">
                                    @error('reduction')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description<span class="text-danger fw-bold"></span></label>
                                    <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" autofocus placeholder="Description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- /.box-body -->
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
            <!-- /.box -->
        </div>
    </div>
@endsection