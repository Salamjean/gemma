@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">ENREGISTREMENT D'UN SERVICE</h4>
                        </div>
                        <div class="">
                            <a href="{{ route('hospital.service.index') }}" class="btn btn-success btn-md shadow">Liste
                                des services</a>
                        </div>
                    </div>
                </div>
                <form class="form" action="{{ route('hospital.service.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">

                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="department" class="form-label">Service<span
                                            class="text-danger fw-bold">*</span></label>
                                    <select class="form-select text-uppercase" id="department" name="department" required
                                        style="width: 100%;">
                                        <option value="">----</option>
                                        @foreach ($services as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="services__container">
                                <div class="text-danger fs-5 py-3">Veuillez renseigner uniquement le prix des actes medicaux
                                    effectués dans votre
                                    structure.</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered  table-hover">
                                        <thead>
                                            <tr>
                                                <th>Acte medical</th>
                                                <th>Prix</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody id="services__body__container">
                                        </tbody>
                                    </table>
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
        $(document).ready(function () {
            $('#services__container').css('display', 'none');
            $('#department').change(function () {
                var department = $(this).val();
                var services = $('#services__body__container');
                services.empty();
                $('#services__container').css('display', 'none');


                if (department) {
                    $.ajax({
                        url: '{{ route('hospital.service.service.search', ':id') }}'.replace(
                            ':id', department),
                        type: 'GET',
                        success: function (response) {
                            $.each(response, function (key, service) {

                                services.append(
                                    `<tr>
                                        <td>${service.libelle}<input type="hidden" name="service[]" value="${service.id}" /></td>
                                        <td><input type="number" class="form-control" name="prix[]" /></td>
                                        <td><textarea class="form-control" name="description[]" ></textarea></td>
                                    </tr>`
                                );

                            });
                            $('#services__container').css('display', 'block');

                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection