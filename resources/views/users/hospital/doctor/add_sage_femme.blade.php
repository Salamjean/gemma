<form class="form" action="{{ route('hospital.doctor.storeSageF') }}"id="sage" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="box-body">
        {{-- info agent --}}
        <h4 class="box-title text-success mb-0"><i class="fa-solid fa-user-md"></i> Infos sur la sage femme
        </h4>
        <hr class="my-15">
        <input type="hidden" name="agent" value="2">


        <div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="matricule" class="form-label">Matricule<span
                                class="text-danger fw-bold">*</span></label>
                        <input type="text" id="matricule" name="matricule"
                            class="form-control @error('matricule') is-invalid @enderror" value="{{ old('matricule') }}"
                            required autocomplete="matricule" autofocus placeholder="N° Matricule">
                        @error('matricule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Nom & Prénom(s)<span
                                class="text-danger fw-bold">*</span></label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            required autocomplete="name" autofocus placeholder="Nom complet">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="contact" class="form-label">Contact<span
                                class="text-danger fw-bold">*</span></label>
                        <div class="d-flex">
                            <span class="form-control w-80 text-center align-center"
                                style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                            <input type="text" id="contact"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                min="10" max="10" name="contact"
                                class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}"
                                required autocomplete="contact" autofocus placeholder="0101010101"
                                data-inputmask="'mask': ['9999999999', '99 99 99 99 99']" data-mask="">
                        </div>
                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address" class="form-label">Lieu d'habitation<span
                                class="text-danger fw-bold">*</span></label>
                        <input type="text" id="address" name="address"
                            class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                            required autocomplete="address" autofocus placeholder="Lieu d'habtitation">
                        @error('address')
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
                            <label for="service" class="form-label">Service<span
                                    class="text-danger fw-bold">*</span></label>
                            <select class="form-select text-uppercase" id="service" name="service" required
                                style="width: 100%;">
                                <option value="">----</option>
                                @foreach ($service as $item)
                                    @if ($item->service->id != '4')
                                        <option value="{{ $item->id }}">{{ $item->service->libelle }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="servicep" class="form-label">Actes medicaux<span
                                class="text-danger fw-bold">*</span></label>
                        <select name="pservice[]" class="form-control select2 select" multiple
                            id="services__body__container" required>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
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

        @include('users.hospital.planning', ['status' => 'store'])

        <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i> Infos de
            connexion
        </h4>
        <hr class="my-15">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">E-mail<span class="text-danger fw-bold">*</span></label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        required autocomplete="email" placeholder="Adresse email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="password" class="form-label">Mot de passe<span
                            class="text-danger fw-bold">*</span></label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required autocomplete="password"
                        placeholder="Entrez le mot de passe">
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
                        passe<span class="text-danger fw-bold">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control @error('confirmation_password') is-invalid @enderror" required
                        autocomplete="confirmation_password" placeholder="Entrez le mot de passe de confirmation">
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

    </div>
    <div class="box-footer text-end">
        <button type="button" class="btn btn-warning me-1" onclick="history.back()">
            <i class="ti-arrow-left"></i> Annuler
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="ti-save-alt"></i> Enregister
        </button>
    </div>
</form>
