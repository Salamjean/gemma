@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="box">
                <div class="box-header with-border">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="box-title">NOUVEAU AGENT</h4>
                        </div>
                        <div class="">
                            <a href="{{ $agent === 'medecin' ? route('hospital.doctor.index.medecin') : route('hospital.doctor.index.sage') }}"
                                class="btn btn-success btn-md shadow">
                                Liste des {{ $agent === 'medecin' ? ' medécins' : ' sages femmes' }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($agent === 'medecin')
                    @include('users.hospital.doctor.add_doctor')
                @else
                    @include('users.hospital.doctor.add_sage_femme')
                @endif
            </div>
        </div>
    </div>

    <style>
        .specialiste {
            display: none;
        }
    </style>

    <script>
        @if ($agent === 'sage')

            const sage = document.getElementById('sage');
        @else
            const medecin = document.getElementById('medecin');
            const radioInputs = document.querySelectorAll('input[type="radio"]');

            const type = document.getElementById('type_name')
            const gynecoContainer = document.getElementById('gynecoContainer');
            const specialiste = document.getElementById('specialiste');

            type.addEventListener("change", function(e) {

                if (type.value === 'specialiste') {

                    document.getElementById("nonGyneco").required = true;

                    if (gynecoContainer.classList.contains('specialiste')) {

                        gynecoContainer.classList.remove('specialiste')
                    }

                } else {

                    document.getElementById("nonGyneco").required = false;
                    document.getElementById('type_doctor').required = false;

                    if (!gynecoContainer.classList.contains('specialiste')) {

                        gynecoContainer.classList.add('specialiste')
                        specialiste.classList.add('specialiste');

                    }
                }
            })

            radioInputs.forEach((input) => {
                input.addEventListener("change", (event) => {
                    if (event.target.checked) {
                        if (event.target.value == '0') {
                            if (specialiste.classList.contains('specialiste')) {
                                specialiste.classList.remove('specialiste');
                                document.getElementById('type_doctor').required = true;
                            }
                        } else {
                            if (!specialiste.classList.contains('specialiste')) {
                                specialiste.classList.add('specialiste');
                                document.getElementById('type_doctor').required = false;
                            }
                        }

                    }
                });
            });
        @endif
    </script>

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
