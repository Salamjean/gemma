@extends('layouts.dashboard', ['title' => 'Modification de médicaments'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">MODIFICATION DE MEDICAMENT</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('pharmacy.drug.index') }}" class="btn btn-success btn-md shadow">Liste des
                                Médicaments</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{ route('pharmacy.drug.update', $drug->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Code du médicament</label>
                                    <input type="text" class="form-control" value="{{ $drug->drug->code }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom du médicament</label>
                                    <input type="text" class="form-control" value="{{ $drug->drug->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity" class="form-label">Quantité<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input min="1" type="number" id="quantity" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        value="{{ $drug->quantity }}" required placeholder="Quantité">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price" class="form-label">Prix<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" id="price" name="price"
                                        class="form-control @error('label') is-invalid @enderror"
                                        value="{{ $drug->price }}" required autocomplete="off" autofocus
                                        placeholder="Prix">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
            </div>


        </div>
        <div class="box-footer text-end">
            <button type="reset" class="btn btn-warning me-1">
                <i class="ti-trash"></i> Annuler
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="ti-save-alt"></i> Enregister les modifications
            </button>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
