@extends('layouts.dashboard')

@section('content')
    @if ($agent->typeAgent->libelle == 'Médecin')
        @if ($agent->type_name == 'specialiste')
            <div class="container-full">
                <section class="content">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="box box-widget widget-user">
                                <div class="widget-user-header bg-img bbsr-0 bber-0" style="" data-overlay="5">
                                    <h3 class="widget-user-username text-white">{{ $agent->user->name }}</h3>
                                    <h6 class="widget-user-desc text-white"></h6>
                                </div>
                                <div class="widget-user-image">
                                    @if ($agent->img_url != null)
                                        <img class="rounded-circle"
                                            src="{{ asset("assets/uploads/doctor/$agent->img_url") }}" alt="User Avatar">
                                    @else
                                        <img class="rounded-circle" src="{{ asset('assets/images/avatar/5.jpg') }}"
                                            alt="User Avatar">
                                    @endif
                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header" style="color: red;">
                                                    {{ $agent->matricule }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 be-1 bs-1">
                                            <div class="description-block">
                                                <h5 class="description-header">
                                                    {{ $agent->typeDoctor ? $agent->typeDoctor->label : 'Gynécologue' }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">
                                                    {{ $agent->serviceHospital->service->libelle }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-body box-profile">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <p><i class="fa fa-envelope"></i><span
                                                        class="text-gray ps-10">{{ $agent->user->email }}</span></p>
                                                <p><i class="fa fa-map-marker"></i><span
                                                        class="text-gray ps-10 text-uppercase">{{ $agent->address }}</span>
                                                </p>
                                                <p><i class="fa fa-phone"></i><span
                                                        class="text-gray ps-10 text-uppercase">{{ $agent->contact }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-7 col-xl-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li><a class="active" href="#activity" data-bs-toggle="tab">Informations sur le
                                            médecin</a></li>
                                </ul>
                                <div class="tab-content">
                                    <h4 class="box-title text-success pt-25"><i class="ti-pencil me-15"></i> Modifier
                                        les données </h4>
                                    <hr class="my-0">
                                    <form class="form pt-20"
                                        action="{{ route('hospital.doctor.update', [$agent->id, 'specialiste']) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="service" class="form-label">Service<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <select class="form-select" id="service" name="service" required
                                                        style="width: 100%;">
                                                        @foreach ($serviceh as $item)
                                                            @if ($item->service->id != '4')
                                                                <option value="{{ $item->id }}"
                                                                    @if ($agent->service_hospital_id == $item->id) selected @endif>
                                                                    {{ $item->service->libelle }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pservice" class="form-label">Prestation de service<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <select name="pservice[]" class="form-control select2 select" multiple
                                                        required style="width: 100%;" id="services__body__container">
                                                        @php
                                                            $idpService = [];
                                                            foreach ($agent->prestationDoctors as $key => $value) {
                                                                $idpService[$key] = $value->prestation_hospital_id;
                                                            }

                                                        @endphp
                                                        @foreach (\App\Models\PrestationHospital::where('service_hospital_id', $agent->service_hospital_id)->get() as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (array_search($item->id, $idpService) !== false) selected @endif>
                                                                {{ $item->prestationService->libelle }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="type_doctor" class="form-label">Type de medecin<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    @if ($agent->typeDoctor)
                                                        <select class="form-select" id="type_doctor" name="type_doctor"
                                                            required style="width: 100%;">
                                                            @foreach ($type as $item)
                                                                <option value="{{ $item->id }}"
                                                                    @if ($agent->type_doctor_id == $item->id) selected @endif>
                                                                    {{ $item->label }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <input class="form-control" id="type_doctor" value="Gynécologue"
                                                            disabled />
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="matricule" class="form-label">Matricule</label>
                                                    <input type="text" id="matricule" name="matricule"
                                                        class="form-control @error('matricule') is-invalid @enderror"
                                                        value="{{ $agent->matricule }}" disabled autocomplete="matricule"
                                                        autofocus placeholder="Matricule du docteur">
                                                    @error('matricule')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Nom & Prénom(s)<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ $agent->user->name }}" required autocomplete="name"
                                                        autofocus placeholder="Nom et prénoms du docteur">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                                            value="{{ $agent->contact }}" required autocomplete="contact"
                                                            autofocus placeholder="Contact">
                                                    </div>
                                                    @error('contact')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="form-label">Adresse<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="text" id="address" name="address"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        value="{{ $agent->address }}" required autocomplete="address"
                                                        autofocus placeholder="Adresse du docteur">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image"
                                                        class="form-label @error('image') is-invalid @enderror">Photo</label>
                                                    <input class="form-control" type="file" id="img_url"
                                                        name="image">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                </div>
                                            </div>

                                        </div>
                                        @include('users.hospital.planning', [
                                            'status' => 'update',
                                            'planning' => $agent->user->availability,
                                        ])
                                        <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i>
                                            Infos de connexion</h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ $agent->user->email }}" disabled autocomplete="email"
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
                                                    <label for="password_confirmation" class="form-label">Confirmation du
                                                        mot de passe</label>
                                                    <input type="password" id="password_confirmation"
                                                        name="password_confirmation"
                                                        class="form-control @error('confirmation_password') is-invalid @enderror"
                                                        autocomplete="confirmation_password"
                                                        placeholder="Resaisir le mot de passe">
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
                                        <div class="d-flex justify-content-end" style="gap: 10px">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti-save-alt"></i> Modifier
                                            </button>
                                            <a href="{{ route('hospital.doctor.index.medecin') }}"
                                                class="btn btn-success btn-md shadow">Retour à la liste</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            <div class="container-full">
                <section class="content">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="box box-widget widget-user">
                                <div class="widget-user-header bg-img bbsr-0 bber-0" style="" data-overlay="5">
                                    <h3 class="widget-user-username text-white">{{ $agent->user->name }}</h3>
                                    <h6 class="widget-user-desc text-white"></h6>
                                </div>
                                <div class="widget-user-image">
                                    @if ($agent->img_url != null)
                                        <img class="rounded-circle"
                                            src="{{ asset("assets/uploads/doctor/$agent->img_url") }}" alt="User Avatar">
                                    @else
                                        <img class="rounded-circle" src="{{ asset('assets/images/avatar/5.jpg') }}"
                                            alt="User Avatar">
                                    @endif

                                </div>
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header" style="color: red;">
                                                    {{ $agent->matricule }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 be-1 bs-1">
                                            <div class="description-block">
                                                <h5 class="description-header">Généraliste</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">
                                                    {{ $agent->serviceHospital->service->libelle }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-body box-profile">
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <p><i class="fa fa-envelope"></i><span
                                                        class="text-gray ps-10">{{ $agent->user->email }}</span></p>
                                                <p><i class="fa fa-map-marker"></i><span
                                                        class="text-gray ps-10 text-uppercase">{{ $agent->address }}</span>
                                                </p>
                                                <p><i class="fa fa-phone"></i><span
                                                        class="text-gray ps-10 text-uppercase">{{ $agent->contact }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-7 col-xl-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li><a class="active" href="#activity" data-bs-toggle="tab">Informations sur le
                                            médecin</a></li>
                                </ul>
                                <div class="tab-content">
                                    <h4 class="box-title text-success pt-25"><i class="ti-pencil me-15"></i> Modifier
                                        les données </h4>
                                    <hr class="my-0">
                                    <form class="form pt-20"
                                        action="{{ route('hospital.doctor.update', [$agent->id, 'generaliste']) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="service" class="form-label">Service<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <select class="form-select" id="service" name="service" required
                                                        style="width: 100%;">
                                                        @foreach ($serviceh as $item)
                                                            @if ($item->service->id != '4')
                                                                <option value="{{ $item->id }}"
                                                                    @if ($agent->service_hospital_id == $item->id) selected @endif>
                                                                    {{ $item->service->libelle }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pservice" class="form-label">Prestation de service<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <select name="pservice[]" class="form-control select2 select" multiple
                                                        required style="width: 100%;" id="services__body__container">
                                                        @php
                                                            $idpService = [];
                                                            foreach ($agent->prestationDoctors as $key => $value) {
                                                                $idpService[$key] = $value->prestation_hospital_id;
                                                            }

                                                        @endphp
                                                        @foreach (\App\Models\PrestationHospital::where('service_hospital_id', $agent->service_hospital_id)->get() as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (array_search($item->id, $idpService) !== false) selected @endif>
                                                                {{ $item->prestationService->libelle }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">Nom & Prénom(s)<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ $agent->user->name }}" required autocomplete="name"
                                                        autofocus placeholder="Nom et prénoms du docteur">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                                            value="{{ $agent->contact }}" required autocomplete="contact"
                                                            autofocus placeholder="Contact">
                                                    </div>
                                                    @error('contact')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="matricule" class="form-label">Matricule</label>
                                                    <input type="text" id="matricule" name="matricule"
                                                        class="form-control @error('matricule') is-invalid @enderror"
                                                        value="{{ $agent->matricule }}" disabled autocomplete="matricule"
                                                        autofocus placeholder="Matricule du docteur">
                                                    @error('matricule')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="form-label">Adresse<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="text" id="address" name="address"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        value="{{ $agent->address }}" required autocomplete="address"
                                                        autofocus placeholder="Adresse du docteur">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image"
                                                        class="form-label @error('image') is-invalid @enderror">Photo</label>
                                                    <input class="form-control" type="file" id="img_url"
                                                        name="image">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        @include('users.hospital.planning', [
                                            'id' => $agent->user->availability->id,
                                            'status' => 'update',
                                            'planning' => $agent->user->availability,
                                        ])
                                        <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i>
                                            Infos de connexion</h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ $agent->user->email }}" disabled autocomplete="email"
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
                                                    <label for="password_confirmation" class="form-label">Confirmation
                                                        du mot de passe</label>
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
                                        <div class="d-flex justify-content-end" style="gap: 10px">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti-save-alt"></i> Modifier
                                            </button>
                                            <a href="{{ route($agent->type_agent_id === 1 ? 'hospital.doctor.index.medecin' : 'hospital.doctor.index.sage') }}"
                                                class="btn btn-success btn-md shadow">Retour à la liste</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    @else
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="box box-widget widget-user">
                            <div class="widget-user-header bg-img bbsr-0 bber-0" style="" data-overlay="5">
                                <h3 class="widget-user-username text-white">{{ $agent->user->name }}</h3>
                                <h6 class="widget-user-desc text-white"></h6>
                            </div>
                            <div class="widget-user-image">
                                @if ($agent->img_url != null)
                                    <img class="rounded-circle"
                                        src="{{ asset("assets/uploads/doctor/$agent->img_url") }}" alt="User Avatar">
                                @else
                                    <img class="rounded-circle" src="{{ asset('assets/images/avatar/7.jpg') }}"
                                        alt="User Avatar">
                                @endif

                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header" style="color: red;">
                                                {{ $agent->matricule }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 be-1 bs-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Sage Femme</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ $agent->serviceHospital->service->libelle }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p><i class="fa fa-envelope"></i><span
                                                    class="text-gray ps-10">{{ $agent->user->email }}</span></p>
                                            <p><i class="fa fa-map-marker"></i><span
                                                    class="text-gray ps-10 text-uppercase">{{ $agent->address }}</span>
                                            </p>
                                            <p><i class="fa fa-phone"></i><span
                                                    class="text-gray ps-10 text-uppercase">{{ $agent->contact }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-7 col-xl-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li><a class="active" href="#activity" data-bs-toggle="tab">Informations sur le
                                        médecin</a></li>
                            </ul>
                            <div class="tab-content">
                                <h4 class="box-title text-success pt-25"><i class="ti-pencil me-15"></i> Modifier
                                    les données </h4>
                                <hr class="my-0">
                                <form class="form pt-20"
                                    action="{{ route('hospital.doctor.update', [$agent->id, 'femme-sage']) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="service" class="form-label">Services<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <select class="form-select" id="service" name="service" required
                                                    style="width: 100%;">
                                                    @foreach ($serviceh as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($agent->service_id == $item->id) selected @endif>
                                                            {{ $item->service->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pservice" class="form-label">Prestation de service<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <select name="pservice[]" class="form-control select2 select" multiple
                                                    required style="width: 100%;" id="services__body__container">
                                                    @php
                                                        $idpService = [];
                                                        foreach ($agent->prestationDoctors as $key => $value) {
                                                            $idpService[$key] = $value->prestation_hospital_id;
                                                        }

                                                    @endphp
                                                    @foreach (\App\Models\PrestationHospital::where('service_hospital_id', $agent->service_hospital_id)->get() as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if (array_search($item->id, $idpService) !== false) selected @endif>
                                                            {{ $item->prestationService->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nom & Prénom(s)<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $agent->user->name }}" required autocomplete="name"
                                                    autofocus placeholder="Nom et prénoms du docteur">
                                                @error('name')
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
                                                        value="{{ $agent->contact }}" required autocomplete="contact"
                                                        autofocus placeholder="Contact">
                                                </div>
                                                @error('contact')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="matricule" class="form-label">Matricule</label>
                                                <input type="text" id="matricule" name="matricule"
                                                    class="form-control @error('matricule') is-invalid @enderror"
                                                    value="{{ $agent->matricule }}" disabled autocomplete="matricule"
                                                    autofocus placeholder="Matricule du docteur">
                                                @error('matricule')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address" class="form-label">Adresse<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="text" id="address" name="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ $agent->address }}" required autocomplete="address"
                                                    autofocus placeholder="Adresse du docteur">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image"
                                                    class="form-label @error('image') is-invalid @enderror">Photo</label>
                                                <input class="form-control" type="file" id="img_url"
                                                    name="image">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    @include('users.hospital.planning', ['status' => 'store'])
                                    <h4 class="box-title text-success mb-0 mt-20"><i class="ti-lock  me-15"></i>
                                        Infos de connexion</h4>
                                    <hr class="my-15">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">E-mail<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ $agent->user->email }}" disabled autocomplete="email"
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
                                                <label for="password_confirmation" class="form-label">Confirmation
                                                    du mot de passe</label>
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
                                    <div class="d-flex justify-content-end" style="gap: 10px">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Modifier
                                        </button>
                                        <a href="{{ route('hospital.doctor.index.sage') }}"
                                            class="btn btn-success btn-md shadow">Retour à la liste</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $('#service').change(function() {
                var department = $(this).val();
                var services = $('#services__body__container');
                services.empty();

                if (department) {
                    $.ajax({
                        url: '{{ route('hospital.service.data.service.search', ':id') }}'.replace(
                            ':id', department),
                        type: 'GET',
                        success: function(response) {
                            $.each(response, function(key, service) {

                                services.append(
                                    `<option value="${service.id}">${service.prestation_service.libelle}</option>`
                                );

                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });

    </script>
@endsection
