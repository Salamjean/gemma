@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-6 col-md-6 col-sm-6 col-6">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="d-flex justify-content-end" style="gap: 10px">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-md shadow">Retour</a>
                    </div>
                </div>
            </div>

            <div class="box-body fs-14">
                <div class="row">
                    <div class="col-md-3">
                        <img class="rounded-circle" src="{{ asset("assets/uploads/super/$admin->img_url")}}" alt="User Avatar">
                    </div>
                    <div class="col-md-9 py-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label"><strong>Email :</strong> {{ $admin->user->email }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>adresse :</strong> {{ $admin->address }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>Contact :</strong> {{ $admin->contact }}</div>
                            </div>
                        </div><hr>
                        <form class="form pt-20" action="{{ route('super.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="row">
                             <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="label" class="form-label">Admin <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $admin->user->name }}"  autocomplete="name"
                                            autofocus placeholder="Nom  de l'admin" >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image"
                                        class="form-label @error('image') is-invalid @enderror">Image</label>
                                    <input class="form-control" type="file" id="img_url" name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i> Infos de connexion</h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">E-mail<span class="text-danger fw-bold">*</span></label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $admin->user->email }}" disabled autocomplete="email"
                                    placeholder="Adresse email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" autocomplete="password"
                                    placeholder="Entrez le mot de passe">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control @error('confirmation_password') is-invalid @enderror"
                                    autocomplete="confirmation_password"
                                    placeholder="Entrez le mot de passe de confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-dark fw-bold"><span class="text-danger fw-bold">*</span>Obligatoires</p>
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

@push('js')
<script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
<script src="{{ asset('assets/src/js/pages/advanced-form-element.js') }}"></script>
@endpush