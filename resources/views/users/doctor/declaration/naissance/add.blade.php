@extends('layouts.dashboard', ['title' => 'Ajout de declaration de naissance'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Enregistrement d'une déclaration de naissance</h4>
                    <h6 class="box-subtitle">Le patient doit être enregistrés.</h6>
                </div>
            </div>


            <div>
                <div style="background: rgba(0, 174, 255, 0.521); margin-bottom: 10px;">

                    <form id="searchPerson">
                        <div class="row p-20">
                            <div class="col-md-12" id="personSelect"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group-select">
                                        <select id="searchBy" name="searchBy" class="form-control"
                                            style="border: none; border-radius:0px; width: 100%; background-color:white;">
                                            <option value="" disabled selected>Veillez selectionner
                                            </option>
                                            <option value="reference">Reference</option>
                                            <option value="date">Date de naissance</option>
                                            <option value="name">Nom & prénoms</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="input-group-select" style="display: flex;">
                                        <input type="text" name="search" id="search" class="form-control"
                                            style="border: none; border-radius:0px; border-right:1px solid rgba(0, 174, 255, 0.521);" />
                                        <button type="submit" class="input-group-text"
                                            style="border: none; border-radius:0px;"><i class="fa-solid fa-search"
                                                style="margin-right: 20px;"></i>Recherche</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div id="results" style="padding: 10px;">

                    </div>

                </div>
            </div>

            <div id="enfant">
                <form id="formAddD" action="{{ route('doctor.declaration.naissance.store') }}" method="POST"
                    class="validation-wizard wizard-circle">
                    @csrf

                    <h3 class="text-dark"><b>Remplissez le formulaire</b></h3>

                    <div class="box">
                        <div class="box-body ribbon-box">
                            <div class="ribbon ribbon-dark">Données sur la mère</div>

                            <div class="mb-0">
                                <section>
                                    <br /><br /><br />
                                    <div class="row">
                                        <input type="hidden" name="person" id="personSelect" required>
                                        <input type="hidden" name="patient_id" id="patientSelect" required>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name" class="form-label"> <b>Nom & prénoms : </b>
                                                    <span class="danger">*</span> </label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Nom & Prenom" disabled>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birth_date" class="form-label"> <b>Date de naissance : </b>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="birth_date" class="form-control"
                                                        data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="genre" class="form-label"> <b>Genre : </b>
                                                </label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="ti-spray"></i></span>
                                                    <input type="genre" name="genree" class="form-control"
                                                        placeholder="Genre" disabled>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </section>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-dark"><b>Informations requises</b></h3>
                    <div class="box">
                        <div class="box-body ribbon-box">
                            <div class="ribbon ribbon-danger">Registre de naissance</div>
                            <section>
                                <br /><br /><br />

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date" class="form-label"> <b>Jour de naissance : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="date" class="form-control"
                                                    data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="lieu" class="form-label"> <b>Lieu de naissance : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="c-inputs-stacked">

                                                <input type="radio" id="lieu1" value="Déjà née à l'arriver"
                                                    name="lieu" required>
                                                <label for="lieu1" class="me-30">Déjà née à l'arriver</label>

                                                <input type="radio" id="lieu2" value="Service d'hospitalisation"
                                                    name="lieu">
                                                <label for="lieu2" class="me-30">Service d'hospitalisation</label>

                                                <input type="radio" id="lieu3" value="En cours de consultation"
                                                    name="lieu">
                                                <label for="lieu3" class="me-30">En cours de consultation</label>

                                                <input type="radio" id="lieu4" value="Aux urgences"
                                                    name="lieu">
                                                <label for="lieu4" class="me-30">Aux urgences</label>

                                                <input type="radio" id="lieu5" value="En cours d'évacuation"
                                                    name="lieu">
                                                <label for="lieu5" class="me-30">En cours d'évacuation</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="heure" class="form-label"> <b>Nombre d'enfant : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-hourglass"></i>
                                                </div>
                                                <input type="number" name="nombre" id="nombre" class="form-control"
                                                    min="1" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="container__enfant">

                                </div>
                                <div class="row container__observation">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="observation" class="form-label"> <br>Observation : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <textarea name="observation" class="form-control" id="observation" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                            </section>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-submit">Enregister</button>
                </form>
            </div>
        </div>

    </div>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: none;
            font-size: 15px;
            text-transform: capitalize;
            padding: 10px 5px;
        }
    </style>
    <script>
        const enfant = document.getElementById('enfant');
        const search = document.getElementById('search');
        const searchBy = document.getElementById('searchBy');
        const results = document.getElementById('results');

        enfant.style.display = 'none';
    </script>
    <script>
        (function($) {
            "use strict";

            $('.container__observation').css('display', 'none');

            $('#searchPerson').on('submit', function(e) {
                e.preventDefault();
                var searchBy = $('select[name="searchBy"]').val();
                var search = $('input[name="search"]').val();
                if (searchBy == '' || search == '') {
                    Swal.fire({
                        text: "Veuillez remplir tous les champs !",
                        icon: "error",
                        button: "ok",
                    });
                    $("#results").html('');
                    $("#patient").css("display", "none");
                    return false;
                }
                if (search.length < 4) {
                    Swal.fire({
                        text: "Lettres minimums pour faire des recherches = 3.",
                        icon: "warning",
                        button: "ok",
                    });
                    $("#results").html('');
                    $("#patient").css("display", "none");

                    return false;
                }
                verify(searchBy, search)

            });

            $('#searchBy').on('change', function(e) {
                e.preventDefault();
                search.value = '';

                if ($('#searchBy').val() == 'date') {
                    search.type = 'date';
                } else if ($('#searchBy').val() == 'reference') {
                    search.type = 'text';
                } else if ($('#searchBy').val() == 'name') {
                    search.type = 'text';
                }

            });

            function verify(searchBy, search) {

                var data = {
                    "searchBy": searchBy,
                    "search": search,
                }
                $.ajax({
                    type: "get",
                    url: "{{ route('doctor.declaration.search') }}",
                    data: data,
                    success: function(response) {
                        if (response.status == 'error') {
                            Swal.fire({
                                text: "Désolé patient non trouvé !",
                                icon: "error",
                                button: "ok",
                            });

                            $("#results").html('');
                            $("#enfant").css("display", "none");
                        }
                        if (response.status == 'success') {

                            Swal.fire({
                                text: "Patient trouvé !",
                                icon: "success",
                                button: "ok",
                            });
                            $("#results").css("display", "block");

                            $('#results').html('');


                            for (var i = 0; i < response.patients.length; i++) {
                                var patient = response.patients[i];

                                var row = $('<tr></tr>');

                                var codeCell = $('<td></td>').text(patient.code_patient);
                                row.append(codeCell);

                                var nameCell = $('<td></td>').text(patient.user.name + ' ' + patient.user
                                    .prenom);
                                row.append(nameCell);

                                var genreCell = $('<td></td>').text(patient.gender);
                                row.append(genreCell);

                                var actionCell = $('<td></td>');
                                var selectButton = $('<button></button>')
                                    .text('Sélectionner')
                                    .click(function() {

                                        var patientData = $(this).closest('tr').data('patientData');

                                        $(`input[name='name']`).val(patientData.user.name + ' ' +
                                            patientData.user.prenom);
                                        $(`input[name='birth_date']`).val(patientData.birth_date);
                                        $(`input[name='genree']`).val(patientData.gender);
                                        $(`input[name='person']`).val($('#person').val());
                                        $(`input[name='patient_id']`).val(patientData.id);
                                        $("#results").css("display", "none");

                                    });
                                actionCell.append(selectButton);
                                row.append(actionCell);

                                row.data('patientData', patient);

                                $('#results').append(row);

                            }

                            $("#enfant").css("display", "block");



                        }

                    }
                });


            }

            $('#nombre').on('input', function() {
                const value = parseInt($(this).val());

                if (value > 0) {
                    $(".container__enfant").empty();
                    $('.container__observation').css('display', 'block');

                    for (var i = 0; i < value; i++) {
                        $(".container__enfant").append(`<div class="row" style="margin-bottom:30px;">
                <div class="col-md-12">
                    <div class="ribbon ribbon-dark" style="margin-left: 10px; margin-top: 10px; background-color:red;">Enfant n°${i+1}</div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">

                        <label for="genre" class="form-label">
                            <b>Genre de l'enfant : <span class="danger">* </span> </b>

                        </label>
                        <select class="form-select" id="genre${i+1}" name="genre${i+1}">
                            <option value="" selected disabled>Selectionner</option>
                            <option value="feminin">feminin</option>
                            <option value="masculin">masculin</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="heure" class="form-label"> <b>Heure de naissance :
                            </b><span class="danger">*</span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-hourglass"></i>
                            </div>
                            <input type="time" name="heure${i+1}" class="form-control" data-inputmask="'alias': 'hh:mm'"
                                data-mask="" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="" class="form-label"> <b>Etat de l'enfant :
                            </b><span class="danger">* </span> <span></span>
                        </label>
                        <div class="input-group">

                            <input type="text" name="nee${i+1}" class="form-control"
                                placeholder="Vivant, Prématuré" required>
                        </div>
                    </div>
                </div>


            </div>`);
                    }
                } else {
                    $('.container__observation').css('display', 'none');
                    $(".container__enfant").empty();
                }
            });


        })(jQuery);
    </script>
@endsection
