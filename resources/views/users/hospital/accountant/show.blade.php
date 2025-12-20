@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.accountant.index') }}" class="btn btn-primary btn-md shadow">Retour à
                                la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body fs-14">
                    <h4 class="box-title text-primary mb-0"><i class="ti-list me-15"></i> Informations </h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset("assets/uploads/accountant/$accountant->img_url") }}" alt="Image de profil"
                                class="rounded-circle">
                        </div>
                        <div class="col-md-9 py-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Matricule :</strong> <span
                                            style="color:red;">{{ $accountant->matricule }}</span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Nom & Prénom :</strong> {{ $accountant->user->name }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Contact :</strong> {{ $accountant->contact }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>E-mail :</strong> {{ $accountant->user->email }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Adresse :</strong> {{ $accountant->address }}</div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-label"><strong>Disponibilité :</strong> {{ dayIndexNameString(json_decode($accountant->user->availability->days)) }}</div>
                                </div>
                            </div>

                            <h4 class="box-title text-success pt-25"><i class="ti-user me-15"></i> Modifier les données
                            </h4>
                            <hr class="my-0">
                            <form class="form pt-20" action="{{ route('hospital.accountant.update', $accountant->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nom & Prénom(s)<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $accountant->user->name }}" required autocomplete="name" autofocus
                                                placeholder="Nom et prénoms du docteur">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Adresse<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="text" id="address" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ $accountant->address }}" required autocomplete="address"
                                                autofocus placeholder="Adresse du docteur">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="contact" class="form-label">Contact<span
                                                class="text-danger fw-bold">*</span></label>
                                        <div class="d-flex">
                                            <span class="form-control w-80 text-center align-center"
                                                style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                            <input type="text" id="contact"
                                                style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                                min="10" max="10" name="contact"
                                                class="form-control @error('contact') is-invalid @enderror"
                                                value="{{ $accountant->contact }}" required autocomplete="contact"
                                                autofocus placeholder="Contact">
                                        </div>
                                        @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @include('users.hospital.planning', ['status' => 'update', 'planning' => $accountant->user->availability])
                                <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i> Infos de
                                    connexion</h4>
                                <hr class="my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">E-mail<span
                                                    class="text-danger fw-bold">*</span></label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ $accountant->user->email }}" disabled autocomplete="email"
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
                                            <label for="image"
                                                class="form-label @error('image') is-invalid @enderror"></label>
                                            <input class="form-control" type="file" id="img_url" name="image">
                                            @error('image')
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
                                            <label for="password_confirmation" class="form-label">Confirmation du mot de
                                                passe</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation"
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
                                        <p class="text-dark fw-bold"><span
                                                class="text-danger fw-bold">*</span>Obligatoires</p>
                                    </div>
                                </div>
                                <div class="box-footer text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Modifier les données
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
