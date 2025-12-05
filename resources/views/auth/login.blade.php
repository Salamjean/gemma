@extends('layouts.auth', ['title' => 'Connexion | GEMMA'])

@section('content')
    <div class="col-12">
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <img src="{{ asset(iconsLoad()['logo']) }}" alt="">
                        <p class="mb-0">Connectez-vous pour continuer</p>
                    </div>
                    <div class="p-40">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input type="email"
                                        class="form-control @error('email') is-invalid @enderror ps-15 bg-transparent"
                                        name="email" id="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    <input type="password"
                                        class="form-control @error('email') is-invalid @enderror ps-15 bg-transparent"
                                        name="password" id="password" required autocomplete="password"
                                        placeholder="Mot de passe">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'Ces informations d\'identification ne correspondent pas.' }}</strong>
                                        </span>
                                    @enderror

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Se souvenir de moi ?</label>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-danger mt-10">Se connecter</button>
                                </div>
                                <div class="col-12 pt-2 text-center">
                                    Mot de passe oublié ?
                                    <a href="{{ '' }}">Cliquez ici</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
