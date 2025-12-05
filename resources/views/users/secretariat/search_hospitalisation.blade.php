@extends('layouts.dashboard')
@section('content') 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box bb-5 border-info">
                    <div class="box-header with-border">
                        <div>
                            <h4 class="box-title fw-bold fs-28">Vérification du status du patient.</h4>
                            <h6 class="box-subtitle">Avant d'enregistrer un nouveau patient, vous pouvez vérifier si le patient
                                est déjà enregistré et faire la mise à jour .</h6>
                        </div>
                        <div class="guide w-full mt-10">
                            <span class="fw-bold">Note </span><span class="text-danger">*</span>
                            <ul>
                                <li>Pour <span class="fw-bold">Enregister</span> un nouveau patient appuyer sur le bouton "
                                    <span class="fw-bold">Ajouter un nouveau</span> " </li>
                                <li>Pour faire une mise à jour des informations du patient, utiliser le formulaire ci-dessous en
                                    renseignant le N° de <span class="fw-bold">Dossier Médical (DM)</span> ou le <span
                                        class="fw-bold">Nom et le prénom(s)</span> ou encore le <span class="fw-bold">N°
                                        assurance</span> du patient .</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-40 bg-dark" style="border-radius: 20px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control h-50" min="10" max="10" autofocus
                                        data-inputmask="'mask': ['9999999999', '99 99 99 99 99']" data-mask=""
                                        id="no_telephone" name="no_telephone" placeholder="Ex: 0707000000">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="search" name="fullname" id="fullname" placeholder="Nom et Prénom(s)"
                                                class="form-control h-50" oninput="convertToUppercase()">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="birth_date" id="birth_date" class="form-control h-50"
                                                data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <button type="button" id="search-button"
                                                class="btn btn-primary h-50">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="resultat-recherche-patient"></div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        $(document).ready(function() {
        $('#search-button').click(function() {
            var telephone = $('#no_telephone').val();
            var fullname = $('#fullname').val();
            var birth_date = $('#birth_date').val();
            //console.log(birth_date);
            if (telephone.length == '' && fullname.length == '' && birth_date.length == '') {
                Swal.fire({
                    text: " Saisissez une valeur de recherche svp !",
                    icon: "error",
                    button: "ok",
                });
                return false;
            }
            $.ajax({
                url: "{{ route('secretariat.searchPatients') }}",
                method: 'GET',
                data: {
                    telephone: telephone,
                    fullname: fullname,
                    birth_date: birth_date
                },
                success: function(response) {
                    var patients = response.patients;

                    if (patients.length) {
                        Swal.fire({
                            text: "" + patients.length + " Patient(s) trouvé(s) . ",
                            icon: "success",
                            button: "ok",
                        });
                        if (patients.length > 1) {
                            // Afficher la liste des patients trouvés
                            var html = '<h2>Resultat de recherche</h2>';
                            html +=
                                '<div class="box"><div class="table-responsive p-10"> <table id="example" class="table table-striped"> <thead class="bg-dark text-white"> <tr> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">N° Dossier médical</span></th>  <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Nom & prénom(s)</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de naissance</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">N° téléphone</span></th>  <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Sexe</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Action</span></th></tr> </thead> <tbody id="tableBody" style="border-radius: 10px">';
                            for (var i = 0; i < patients.length; i++) {
                                html += '<tr>';
                                html +=
                                    '<td><span class="badge text-dark fw-bold fs-14"> ' +
                                    patients[i].code_patient + '</span></td>';
                                html +=
                                    '<td><span class="badge text-dark fw-bold fs-14"> ' +
                                    patients[i].user.name + ' ' + patients[i].user.prenom +
                                    '</span></td>';
                                html +=
                                    '<td><span class="badge text-dark fw-bold fs-14"> ' +
                                    patients[i].birth_date + '</span></td>';
                                html +=
                                    '<td><span class="badge text-dark fw-bold fs-14"> ' +
                                    patients[i].telephone + '</span></td>';
                                html +=
                                    '<td><span class="badge text-dark fw-bold fs-14"> ' +
                                    patients[i].gender + '</span></td>';
                                html +=
                                    '<td class="text-center"><a href="#" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Détail" onclick="showUpdateForm(' +
                                    patients[i].id +
                                    ')"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Selectionner et modifier</a></td>';

                                html += '</tr>';
                            }
                            html += '</tbody></table></div></div>';
                            $('#resultat-recherche-patient').html(html);
                            addPatient.style.display = 'none';

                        } else if (patients.length === 1) {
                            var patient = patients[0];
                            // Remplir le formulaire avec les informations du patient
                            $('#patient_id').val(patient.id);
                            $('#name_up').val(patient.user.name);
                            $('#prenom_up').val(patient.user.prenom);
                            $('#pays_up').val(patient.country);
                            $('#email_up').val(patient.user.email);
                            $('#code_patient').val(patient.code_patient);
                            $('#birth_date_up').val(patient.birth_date);
                            $('#numero_identite_up').val(patient.numero_identite);
                            $('#gender_up').val(patient.gender);
                            $('#telephone').val(patient.telephone);
                            $('#contact2_up').val(patient.contact2);
                            $('#profession_up').val(patient.profession);
                            $('#type_piece_up').val(patient.type_piece);
                            $('#residence_habituelle_up').val(patient.residence_habituelle
                                .name);
                            $('#residence_actuelle_up').val(patient.residence_actuelle
                            .name);
                            $('#situation_matrimoniale_up').val(patient
                                .situation_matrimoniale);
                            $('#address_up').val(patient.address);
                            $('#ethnie_up').val(patient.ethnie);
                            $('#lieu_naissance_up').val(patient.lieu_naissance.name);
                            $('#nbre_enfant_up').val(patient.nbre_enfant);
                            $('#nom_personne_cas_urgence_up').val(patient
                                .nom_personne_cas_urgence);
                            $('#telephone_personne_cas_urgence_up').val(patient
                                .telephone_personne_cas_urgence);
                            $('#lien_personne_cas_urgence_up').val(patient
                                .lien_personne_cas_urgence);

                            // Champs modifiable //
                            //$('#telephone_up').prop('readonly', false);
                            $('#residence_actuelle_up').prop('readonly', false);
                            $('#residence_habituelle_up').prop('readonly', false);
                            $('#contact2_up').prop('readonly', false);

                            if (patient.user.name !== '') {
                                $('#birth_date_up').prop('readonly', true);
                                $('#name_up').prop('readonly', true);
                                $('#prenom_up').prop('readonly', true);
                                $('#gender_up').prop('readonly', true);
                            }
                            if (patient.user.name == null) {
                                $('#birth_date_up').prop('readonly', false);
                                $('#name_up').prop('readonly', false);
                                $('#prenom_up').prop('readonly', false);
                                $('#gender_up').prop('readonly', false);
                            }

                            // Champs non modifiable //
                            $('#lieu_naissance_up').prop('readonly', true);
                            $('#pays_up').prop('readonly', true);

                            //Champs select //
                            $('#residence_habituelle_up option').each(function() {
                                if ($(this).val() === patient.residence_habituelle
                                    .name) {
                                    $(this).prop('selected', true);
                                }
                            });
                            $('#residence_actuelle_up option').each(function() {
                                if ($(this).val() === patient.residence_actuelle
                                    .name) {
                                    $(this).prop('selected', true);
                                }
                            });
                            $('#profession_up option').each(function() {
                                if ($(this).val() === patient.profession) {
                                    $(this).prop('selected', true);
                                }
                            });
                            $('#ethnie_up option').each(function() {
                                if ($(this).val() === patient.ethnie) {
                                    $(this).prop('selected', true);
                                }
                            });

                            $('#type_piece_up option').each(function() {
                                if ($(this).val() === patient.type_piece) {
                                    $(this).prop('selected', true);
                                }
                            });
                            $('#situation_matrimoniale_up option').each(function() {
                                if ($(this).val() === patient
                                    .situation_matrimoniale) {
                                    $(this).prop('selected', true);
                                }
                            });

                            //champs radio button
                            $('#en_cours_de_scolarisation_up input[type="radio"]').each(
                                function() {
                                    if ($(this).val() === patient
                                        .en_cours_de_scolarisation) {
                                        $(this).prop('checked', true);
                                    }
                                });
                            $('#tranche_age_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.tranche_age) {
                                    $(this).prop('checked', true);
                                }
                            });

                            $('#tabac_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.tabac) {
                                    $(this).prop('checked', true);
                                }
                            });
                            $('#alcool_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.alcool) {
                                    $(this).prop('checked', true);
                                }
                            });
                            $('#group_sanguin_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.group_sanguin) {
                                    $(this).prop('checked', true);
                                }
                            });


                            $('#type_population_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.type_population) {
                                    $(this).prop('checked', true);
                                }
                                if ($('#autrePopulUp').prop('checked', true)) {
                                    autrePopulInputUp.style.display = 'block';
                                }
                            });
                            $('#type_population_up input[type="radio"]').each(function() {
                                if ($(this).val() === patient.type_population) {
                                    $(this).prop('checked', true);

                                    if ($(this).val() === 'autrePopulUp') {
                                        autrePopulInputUp.style.display = 'block';
                                    }
                                    if ($(this).val() != 'autrePopulUp') {
                                        autrePopulInputUp.style.display = 'none';
                                    }
                                }
                            });
                            resultatSearch.style.display = 'block';
                            updateForm.style.display = 'block';
                            addPatient.style.display = 'none';
                        } else {
                            Swal.fire({
                                text: "Aucun patient trouvé",
                                icon: "error",
                                button: "ok",
                            });

                        }
                    } else {
                        Swal.fire({
                            text: "Aucun patient trouvé",
                            icon: "error",
                            button: "ok",
                        });
                        resultatSearch.style.display = 'none';
                        updateForm.style.display = 'none';
                        addPatient.style.display = 'none';
                    }
                }
            });
        });

    });
    </script>
    @endpush
@endsection