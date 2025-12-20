@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT D'UNE CONSULTATION</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.mode.admission') }}" class="btn btn-success btn-md shadow">Liste de consultation</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('hospital.mode.admission.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-success mb-0"><i class="ti-user me-15"></i>Infos consultation</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle" class="form-label">Libelle<span class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="libelle" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus placeholder="Libelle de la consultation">
                                    @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount" class="form-label">Prix<span class="text-danger fw-bold">*</span></label>
                                    <input type="number" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required autocomplete="amount" autofocus placeholder="Prix de la consultation">
                                    @error('amount')
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

