@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="box bg-success-light">
            <a href="#">
                <div class="box-body text-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="p-5 w-100 h-100">
                            <img src="{{ asset('assets/icons/money.png')}}" class="" alt="icon">
                        </div>
                        <div class="text-end">
                            <h2 class="mb-0 fw-600 text-success">{{ $totalMontant }}</h2>
                            <p class="text-fade mt-5 mb-0 text-success">Somme (F CFA)</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/consultation.png')}}" class="" alt="doctor">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalConsult }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Consultations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/uploads/baby.png')}}" class="" alt="secretariat">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalDN }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Déclaration de naissance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/uploads/deces.png')}}" class="" alt="consultation">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalDD }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Declaration de décès</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-12">
        <div class="box bg-primary-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/team.png')}}" class="" alt="icon">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalPatient }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Patient(e)s</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-12">
        <div class="box bg-danger-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/uploads/agent.png')}}" class="" alt="icon">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalDoctor }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Agent(s) de santé</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="box bg-success-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission_valid.png') }}" class="" alt="secretariat">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalAdmAttente}}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Admissions en Attente</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-12">
        <div class="box bg-warning-light">
            <div class="box-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="p-5 w-100 h-100">
                        <img src="{{ asset('assets/icons/admission.png')}}" class="" alt="icone">
                    </div>
                    <div class="text-end">
                        <h2 class="mb-0 fw-600 text-success">{{ $totalAdmission }}</h2>
                        <p class="text-fade mt-5 mb-0 text-success">Admission(s) enregistrée(s)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h4 class="box-title"><b>LISTE DES SERVICES</b></h4>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-hover display nowrap margin-top-10 w-p100">
                        <thead>
                            <tr>
                                <th class="bb-2">N°</th>
                                <th class="bb-2">Libelle</th>
                                <th class="bb-2">Nombre de prestations</th>
                                <th class="bb-2 text-center">Status</th>
                                <th class="bb-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <td class="text-dark fw-bold fs-6">{{ $loop->index + 1 }}</td>
                                    <td>
                                        {{ $item->service->libelle }}
                                    </td>
                                    <td>{{ count($item->prestationHospitals) }}</td>
                                    <td class="text-center">
                                        @if ($item->status == 0)
                                            <span class="text-success">Activé</span>
                                        @else
                                            <span class="text-danger">Désactivé</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('super.hospital.statusSce', $item->id) }}"
                                            class="btn btn-sm {{ $item->status == 0 ? 'btn-success' : 'btn-danger' }}"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Activer/Désactiver"><i
                                                class="fa-solid {{ $item->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 