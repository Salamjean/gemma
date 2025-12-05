@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.doctor.index') }}" class="btn btn-primary btn-md shadow">Retour à la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body fs-22">
                    <h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i> Informations sur le docteur <span class="text-lowercase">{{ $doctor->user->name }}</span></h4>
                    <hr class="my-15">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset("assets/uploads/doctor/$doctor->img_url")}}" alt="Image de profil" class="img-thumbnail mt-3" >
                            <div class="text-center py-5">{{ $doctor->user->name }}</div>
                        </div>
                        <div class="col-md-9 py-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Matricule :</strong> {{ $doctor->matricule }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Nom & Prénom :</strong> {{ $doctor->user->name }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Type de docteur :</strong> {{ $doctor->typeDoctor->label }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Service :</strong> {{ $doctor->departement->libelle }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Contact :</strong> {{ $doctor->contact }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>E-mail :</strong> {{ $doctor->user->email }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label"><strong>Adresse :</strong> {{ $doctor->address }}</div>
                                </div>
                            </div>
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
