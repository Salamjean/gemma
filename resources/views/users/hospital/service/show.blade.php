@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">


                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ route('hospital.service.index') }}" class="btn btn-primary btn-md shadow">Retour à
                                la liste</a>
                        </div>
                    </div>
                </div>

                <div class="box-body fs-14">
                    <h4 class="box-title text-primary mb-0"><i class="fa-solid fa-building-user"></i> Informations | <span
                            class="text-lowercase" style="color:brown;">{{ $service->libelle }}</span></h4>
                    <hr class="my-6">
                    <div class="row">
                        <div class="col-md-12 fs-3 py-10">
                            <div class="form-label"><strong>Nom du service :</strong>
                                {{ $service->service->libelle }}</div><br>
                            <h4 class="box-title text-success pt-10"><i class="ti-pencil me-15"></i> Modifier les données
                            </h4>
                            <hr class="my-0"><br>
                            <form class="form" action="{{ route('hospital.service.update', $service->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12" id="services__container">



                                        <div class="table-responsive fs-6">
                                            <table class="table table-bordered  table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Acte medical</th>
                                                        <th>Prix</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="">
                                                    @foreach ($service->prestationHospitals as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $item->prestationService->libelle }}
                                                                <input type="hidden" name="serviceupdate[]"
                                                                    value="{{ $item->id }}" />
                                                                <span class="mx-4">
                                                                    <a
                                                                        href="{{ route('hospital.service.service.delete', $item->id) }}"><span
                                                                            class="fa-solid fa-trash fs-5 "></span></a>
                                                                </span>
                                                            </td>
                                                            <td><input type="number" class="form-control"
                                                                    value="{{ $item->prix }}" name="prixupdate[]" />
                                                            </td>
                                                            <td>
                                                                <textarea class="form-control"
                                                                    name="descriptionupdate[]">{{ $item->description }}</textarea>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @php
                                            $idPService = [];
                                            foreach ($service->prestationHospitals as $key => $value) {
                                                $idPService[$key] = $value->prestation_service_id;
                                            }
                                        @endphp
                                        @if (count($service->prestationHospitals) > 0)
                                            <div class="col-md-12" id="services__container">
                                                <div class="text-danger fs-5 py-3"> <i class="me-15 ti-plus"></i> Ajouter
                                                    des
                                                    actes medicaux</div>
                                                <div class="table-responsive fs-6">
                                                    <table class="table table-bordered  table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Acte medical</th>
                                                                <th>Prix</th>
                                                                <th>Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="services__body__container">
                                                            @foreach ($servicei->prestationServices as $key => $item)
                                                                @if (array_search($item->id, $idPService) === false)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $item->libelle }}
                                                                            <input type="hidden" name="service[]"
                                                                                value="{{ $item->id }}" />
                                                                        </td>
                                                                        <td><input type="number" class="form-control" name="prix[]" />
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control"
                                                                                name="description[]"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
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
    </div>
@endsection