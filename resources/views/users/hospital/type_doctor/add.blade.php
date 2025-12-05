@extends('layouts.dashboard', ['title' => 'Ajout de specialité'])


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">NOUVEAU SPECIALITE</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.type.doctor.index') }}" class="btn btn-success btn-md shadow">Liste des types de Medecin</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('hospital.type.doctor.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-success mb-0"><i class="fa-solid fa-address-book"></i> Infos sur la specialialité</h4>
                        <hr class="my-15"><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="label" class="form-label">Nom du type <span class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="label" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ old('label') }}" required autocomplete="label" autofocus placeholder="Entrez le type de medecin">
                                    @error('label')
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

