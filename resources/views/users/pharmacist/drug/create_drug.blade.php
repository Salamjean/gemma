@extends('layouts.dashboard', ['title' => 'Enregistrement de médicaments'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT DE MEDICAMENT</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('pharmacy.drug.index') }}" class="btn btn-success btn-md shadow">Liste des
                                Médicaments</a>
                        </div>
                    </div>
                </div>
                @php
                    $dhId = [];
                    foreach ($drugHospital as $key => $item) {
                        if($item->status  != 1)
                            $dhId[$key] = $item->drug->id;
                    }
                @endphp
                <form class="form" action="{{ route('pharmacy.drug.store') }}" id="formSubmit" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="drug_id" class="form-label">Nom du médicament<span
                                            class="text-danger fw-bold">*</span></label>
                                    <select class="form-select select2" id="drug_id" name="drug_id" required
                                        style="width: 100%; ">
                                        <option value="">----</option>
                                        @foreach ($drugs as $item)
                                            @if (!in_array($item->id, $dhId))
                                                <option value="{{ $item->id }}" style="text-transform:capitalize;">
                                                    {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Prix<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" id="price" name="price"
                                        class="form-control @error('label') is-invalid @enderror"
                                        value="{{ old('price') }}" required autocomplete="price" autofocus
                                        placeholder="Prix">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity" class="form-label">Quantité en stock<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input min="1" type="number" id="quantity" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        value="{{ old('quantity') }}" required autocomplete="label" autofocus
                                        placeholder="Quantité">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="box-footer text-end">
                        <button type="reset" class="btn btn-warning me-1">
                            <i class="ti-trash"></i> Annuler
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti-save-alt"></i> Enregister
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#formSubmit").submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Etes vous sure d\'enregistrer le medicament?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#formSubmit")[0].submit();
                        let timerInterval
                        Swal.fire({
                            title: 'Chargement!',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()

                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                })
            });
        });
    </script>
@endsection
