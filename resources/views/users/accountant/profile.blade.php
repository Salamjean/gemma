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
                            <img src="{{ asset("assets/uploads/accountant/$accountant->img_url") }}" alt="Image de profil"
                                class="img-thumbnail mt-3">
                        </div>
                        <div class="col-md-9 py-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Nom :</strong> {{ Illuminate\Support\Facades\Auth::user()->name }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Prénoms :</strong> {{ Illuminate\Support\Facades\Auth::user()->prenom }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Email :</strong> {{ Illuminate\Support\Facades\Auth::user()->email }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Adresse :</strong> {{ $accountant->address }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Contact :</strong> {{ $accountant->contact }}</div>
                                </div>
                            </div>
                            <form class="form pt-20" action="{{ route('accountant.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                 @method('PUT')
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
                                <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i> Infos de
                                    connexion</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">E-mail<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ Illuminate\Support\Facades\Auth::user()->email }}" disabled autocomplete="email"
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
                                                class="form-control @error('password') is-invalid @enderror"
                                                autocomplete="password" placeholder="Entrez le mot de passe">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">Confirmer le mot de
                                                passe</label>
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
                                        <p class="text-dark fw-bold"><span class="text-danger fw-bold">*</span>Obligatoires
                                        </p>
                                    </div>
                                </div>
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
@endsection