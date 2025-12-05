@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.mode.admission') }}" class="btn btn-primary btn-md shadow">Retour à la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body fs-14">
                    <h4 class="box-title text-primary mb-0"><i class="ti-list me-15"></i> Informations </h4>
                    <hr class="my-15">
                    <div class="row">

                        <div class="col-md-12 py-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Libelle :</strong> <span style="color:red;">{{ $mode->libelle }}</span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Prix :</strong> {{ $mode->prix }} Fr CFA</div>
                                </div>
                            </div>

                            <h4 class="box-title text-success pt-25"><i class="ti-user me-15"></i> Modifier les données </h4>
                            <hr class="my-0">
                            <form class="form pt-20" action="{{ route('hospital.mode.admission.update', $mode->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="libelle" class="form-label">Libelle<span class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="libelle" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ $mode->libelle }}" required autocomplete="libelle" autofocus placeholder="Libelle de la consultation">
                                            @error('libelle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">prix<span class="text-danger fw-bold">*</span></label>
                                            <input type="number" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $mode->prix }}" required autocomplete="amount" autofocus placeholder="Prix de la consultation">
                                            @error('amount')
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
    </div>
    </div>
@endsection

