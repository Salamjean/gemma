@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="d-flex justify-content-end" style="gap: 10px">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-md shadow">Retour</a>
                    </div>
                </div>
            </div>

            <div class="box-body fs-14">
                <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Informations sur l'hopital<span
                        class="text-lowercase"></span></h4>
                <hr class="my-15">
                <div class="row">
                    <div class="col-md-3">
                            <img src="{{ asset("assets/uploads/hospital/$hospital->img_url")}}" alt="Image de profil" class="img-thumbnail mt-3" >
                    </div>
                    <div class="col-md-9 py-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-label"><strong>Reference : </strong><span style="color:red;">{{
                                        $hospital->reference }}</span></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>Nom de l'hopital:</strong> {{ $hospital->user->name ?? $hospital->label }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>Email:</strong> {{
                                    $hospital->user->email }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>District Sanitaire :</strong> {{
                                    $hospital->district_sanitaire }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label"><strong>Contact :</strong> {{ $hospital->contact }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label">
                                    <strong>Status de l'hopital :</strong>
                                    @if($hospital->status == 0)
                                    Actif
                                    @else
                                    Non actif
                                    @endif
                                </div>
                            </div>

                        </div>

                        <h4 class="box-title text-success pt-25"><i class="ti-user me-15"></i> Modifier les données
                        </h4>
                        <hr class="my-0">
                        <form class="form pt-20" action="{{ route('hospital.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="label" class="form-label">Nom Hopital <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="label" name="label"
                                            class="form-control @error('label') is-invalid @enderror"
                                            value="{{ $hospital->user->name ?? $hospital->label }}"  autocomplete="name"
                                            autofocus placeholder="Nom  de l'hopital" disabled>
                                        @error('label')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contact" class="form-label">Contact<span
                                                class="text-danger fw-bold">*</span></label>
                                        <div class="d-flex">
                                            <span class="form-control w-80 text-center align-center"
                                                style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                            <input type="text" id="contact"
                                                style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                                min="10" max="10" name="contact"
                                                class="form-control @error('contact') is-invalid @enderror"
                                                value="{{ $hospital->contact }}" 
                                                autocomplete="contact" autofocus placeholder="Contact">
                                        </div>
                                        @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Localité<span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="address" name="localite"
                                            class="form-control @error('localite') is-invalid @enderror"
                                            value="{{ $hospital->localiteH->name }}" 
                                            autocomplete="address" autofocus placeholder="Adresse du docteur" disabled>
                                        @error('localite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="district" class="form-label">District sanitaire<span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="district" name="district"
                                            class="form-control @error('district') is-invalid @enderror"
                                            value="{{ $hospital->district_sanitaire }}" 
                                            autocomplete="district" autofocus placeholder="District sanitaire" disabled>
                                        @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="direction_generale" class="form-label">Direction générale</label>
                                        <input type="text" id="direction_generale" name="direction_generale"
                                            class="form-control @error('direction_generale') is-invalid @enderror"
                                            value="{{ $hospital->nom_direction_generale }}" autofocus
                                            placeholder="Nom de la direction générale" disabled>
                                        @error('direction_generale')
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
                                            value="{{ $hospital->user->email }}" disabled autocomplete="email"
                                            placeholder="Adresse email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Confirmation du mot de
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