@extends('layouts.dashboard', ['title' => 'Ajout de declaration de décès'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Enregistrement d'une déclaration de décès</h4>
                    <h6 class="box-subtitle">Le patient doit être enregistrés ou la mère du patient.</h6>
                </div>
            </div>

            <div id="searchPatientSection">
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

            @if ($person === 'patient')
                <div id="patient">
                    <form id="formAdd" action="{{ route('doctor.declaration.deces.store.patient') }}" method="POST"
                        class="validation-wizard wizard-circle" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-dark"><b>Remplissez le formulaire</b></h3>

                        <div class="box">
                            <div class="box-body ribbon-box">
                                <div class="ribbon ribbon-dark">Données sur le Patient</div>

                                <div class="mb-0">
                                    <section>
                                        <br /><br /><br />
                                        <div class="row">
                                            <input type="hidden" name="person" id="personSelect" value="patient" required>
                                            <input type="hidden" name="patient_id" id="patientSelect" required>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="form-label"> <b>Nom & prénoms patient :
                                                        </b>
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
                                                    <label for="genre" class="form-label"> <b>Genre du Patient : </b>
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
                        <input type="hidden" value="1" name="nombre">
                        <h3 class="text-dark"><b>Informations requises</b></h3>
                        <div class="box">
                            <div class="box-body ribbon-box">
                                <div class="ribbon ribbon-danger">Registre de décès</div>
                                <section>
                                    <br /><br /><br />

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mResidenceHactuel" class="form-label"> <b>Milieu de Résidence
                                                        hatituelle: </b><span class="danger">*</span>
                                                </label>
                                                <div class="c-inputs-stacked">
                                                    <input type="radio" id="mUrbain" value="Urbain"
                                                        name="milieu_residence" required>
                                                    <label for="mUrbain" class="me-30">Urbain</label>
                                                    <input type="radio" id="mRural" value="Rural"
                                                        name="milieu_residence">
                                                    <label for="mRural" class="me-30">Rural</label>
                                                    <input type="radio" id="mInconnu" value="Inconnu"
                                                        name="milieu_residence">
                                                    <label for="mInconnu" class="me-30">Inconnu</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date" class="form-label"> <b>Date de décès : </b><span
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="heure" class="form-label"> <b>Heure de décès : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-hourglass"></i>
                                                    </div>
                                                    <input type="text" name="heure" class="form-control"
                                                        data-inputmask="'alias': 'hh:mm'" data-mask="" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="deces_maternel" class="form-label"> <b>Décès maternel : </b>
                                                    <span class="danger">*</span>
                                                </label>
                                                <select class="form-select required" id="deces_maternel"
                                                    name="deces_maternel">
                                                    <option value="" selected disabled>Selectionner</option>
                                                    <option value="oui">Oui</option>
                                                    <option value="non">Non</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="lieu" class="form-label"> <b>Lieu de décès : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="c-inputs-stacked">

                                                    <input type="radio" id="lieu1" value="Arrivé décédé"
                                                        name="lieu" required>
                                                    <label for="lieu1" class="me-30">Arrivé décédé</label>

                                                    <input type="radio" id="lieu2"
                                                        value="Service d'hospitalisation" name="lieu">
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


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cInitiale" class="form-label"> <br>Cause Initiale du décès :
                                                    </b><span class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="cause_initiale" class="form-control" id="cInitiale" cols="30" rows="6" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cDirecte" class="form-label"> <br>Cause Directe du décès :
                                                    </b><span class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="cause_directe" class="form-control" id="cDirecte" cols="30" rows="6" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="observation" class="form-label"> <br>Observation : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="observation" class="form-control" id="observation" cols="30" rows="10" required></textarea>
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
            @else
                <div id="patient">
                    <form id="formAddD" action="{{ route('doctor.declaration.deces.store.enfant') }}" method="POST"
                        class="validation-wizard wizard-circle">
                        @csrf

                        <h3 class="text-dark"><b>Remplissez le formulaire</b></h3>

                        <div class="box">
                            <div class="box-body ribbon-box">
                                <div class="ribbon ribbon-dark">Données sur le Patient</div>

                                <div class="mb-0">
                                    <section>
                                        <br /><br /><br />
                                        <div class="row">
                                            <input type="hidden" name="person" id="personSelect" value="enfant" required>
                                            <input type="hidden" name="deces_maternel" value="oui" required>
                                            <input type="hidden" name="patient_id" id="patientSelect" required>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="form-label"> <b>Nom & prénoms patient :
                                                        </b>
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
                                                    <label for="birth_date" class="form-label"> <b>Date de naissance :
                                                        </b>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" name="birth_date" class="form-control"
                                                            data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="genre" class="form-label"> <b>Genre du Patient : </b>
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
                                <div class="ribbon ribbon-danger">Registre de décès</div>
                                <section>
                                    <br /><br /><br />

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mResidenceHactuel" class="form-label"> <b>Milieu de Résidence
                                                        hatituelle: </b><span class="danger">*</span>
                                                </label>
                                                <div class="c-inputs-stacked">
                                                    <input type="radio" id="mUrbain1" value="Urbain"
                                                        name="milieu_residence" required>
                                                    <label for="mUrbain1" class="me-30">Urbain</label>
                                                    <input type="radio" id="mRural1" value="Rural"
                                                        name="milieu_residence">
                                                    <label for="mRural1" class="me-30">Rural</label>
                                                    <input type="radio" id="mInconnu1" value="Inconnu"
                                                        name="milieu_residence">
                                                    <label for="mInconnu1" class="me-30">Inconnu</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date" class="form-label"> <b>Date de décès : </b><span
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="heure" class="form-label"> <b>Heure de décès : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-hourglass"></i>
                                                    </div>
                                                    <input type="text" name="heure" class="form-control"
                                                        data-inputmask="'alias': 'hh:mm'" data-mask="" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="heure" class="form-label"> <b>Nombre d'enfant : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-hourglass"></i>
                                                    </div>
                                                    <input type="number" name="nombre" class="form-control"
                                                        min="1" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="heure" class="form-label"> <b>Genre des enfants : </b><span
                                                        class="danger">* </span> <span>(séparé par des virgules si
                                                        plusieurs)</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-hourglass"></i>
                                                    </div>
                                                    <input type="text" name="genre" class="form-control"
                                                        placeholder="masculin, feminin, masculin" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="lieu" class="form-label"> <b>Lieu de décès : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="c-inputs-stacked">

                                                    <input type="radio" id="lieu11" value="Arrivé décédé"
                                                        name="lieu" required>
                                                    <label for="lieu11" class="me-30">Arrivé décédé</label>

                                                    <input type="radio" id="lieu21"
                                                        value="Service d'hospitalisation" name="lieu">
                                                    <label for="lieu21" class="me-30">Service d'hospitalisation</label>

                                                    <input type="radio" id="lieu31" value="En cours de consultation"
                                                        name="lieu">
                                                    <label for="lieu31" class="me-30">En cours de consultation</label>

                                                    <input type="radio" id="lieu41" value="Aux urgences"
                                                        name="lieu">


                                                    <label for="lieu41" class="me-30">Aux urgences</label>

                                                    <input type="radio" id="lieu51" value="En cours d'évacuation"
                                                        name="lieu">
                                                    <label for="lieu51" class="me-30">En cours d'évacuation</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cInitiale" class="form-label"> <br>Cause Initiale du décès :
                                                    </b><span class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="cause_initiale" class="form-control" id="cInitiale" cols="30" rows="6" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cDirecte" class="form-label"> <br>Cause Directe du décès :
                                                    </b><span class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="cause_directe" class="form-control" id="cDirecte" cols="30" rows="6" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="observation" class="form-label"> <br>Observation : </b><span
                                                        class="danger">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea name="observation" class="form-control" id="observation" cols="30" rows="10" required></textarea>
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
            @endif

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
        const patient = document.getElementById('patient');
        const search = document.getElementById('search');
        const searchBy = document.getElementById('searchBy');
        const results = document.getElementById('results');

        patient.style.display = 'none';
    </script>
    <script>
        (function($) {
            "use strict";

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
                            $("#patient").css("display", "none");
                        }
                        if (response.status == 'success') {
                            $("#results").css("display", "block");
                            Swal.fire({
                                text: "Patient trouvé !",
                                icon: "success",
                                button: "ok",
                            });

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
                                        $(`input[name='patient_id']`).val(patientData.id);
                                        $("#results").css("display", "none");


                                    });
                                actionCell.append(selectButton);
                                row.append(actionCell);

                                row.data('patientData', patient);

                                $('#results').append(row);

                            }

                            $("#patient").css("display", "block");




                        }

                    }
                });


            }


        })(jQuery);
    </script>
@endsection
