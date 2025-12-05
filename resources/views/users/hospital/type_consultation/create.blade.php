@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT D'UN MOTIF</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.type.consultation.index') }}" class="btn btn-success btn-md shadow">Liste des motifs de consultations</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('hospital.type.consultation.store') }}" method="post">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-success mb-0"><i class="ti-user me-15"></i>Infos sur le motif de consultation</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="libelle" class="form-label">Libelle<span class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="libelle" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus placeholder="Libelle du motif de consultation"
                                    @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prix" class="form-label">Prix<span class="text-danger fw-bold">*</span></label>
                                    <input type="number" id="prix" name="prix" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix') }}" required autocomplete="prix" autofocus placeholder="Prix de la consultation">
                                    @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-8">
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


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-end">
                        <button type="reset" class="btn btn-warning me-1">
                            <i class="ti-trash"></i> Annuler
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

