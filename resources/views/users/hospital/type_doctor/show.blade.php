@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.type.doctor.index') }}" class="btn btn-success btn-md shadow">Retour à la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <h4 class="box-title text-primary mb-0"><i class="fa-solid fa-address-book"></i> Type Medecin | <span class="text-lowercase" style="color:brown;">{{ $type->label }}</span></h4>
                    <hr class="my-15"><br>
                    <div class="row">
                        <div class="col-md-12">

                            <form class="form" action="{{ route('hospital.type.doctor.update', $type->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="'label'" class="form-label">Nom du type<span class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="label" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ $type->label }}" required autocomplete="label" autofocus placeholder="Nom du type de medecin">
                                            @error('label')
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

