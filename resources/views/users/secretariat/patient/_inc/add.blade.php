<div class="container" id="addPatient">
    <form id="formAdd">
        @csrf
        <div class="mont-aff border-dark">
            <label class="title mb-4">Montant à payer à la Caisse</label>
            <h3 class="box-title">
                <input type="hidden" class="form-control" name="montant" id="montant">
                <b id="prix"> 0 Frs CFA</b>
            </h3>
        </div>
        <br/><br/>
        <!-- Step 1 -->
        <div class="box bb-3 border-warning pe-95 pb-20 ps-95 pt-20 bg-color">
            <div class="box-body ribbon-box">
                <div class="ribbon ribbon-dark rounded5">Données sur le Patient</div>
                <br/><br/><br/>
                <div class="box bb-3 border-danger p-10">
                    <div class="row">
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="form-label"> <b>Nom : </b> <span
                                            class="danger">*</span> </label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="ti-user"></i></span>
                                        <input type="text" name="name" class="form-control" placeholder="Nom" id="name" oninput="convertToUppercase()">
                                    </div>

                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="prenom" class="form-label"> <b>Prénom(s) : </b> <span
                                        class="danger">*</span> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-user"></i></span>
                                    <input type="text" name="prenom" class="form-control" placeholder="Prénom(s)" id="prenom" oninput="convertToUppercase()">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-label"> <b>E-mail : </b> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="ti-email"></i></span>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>

                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="gender" class="form-label"> <b>Sexe : </b> <span class="danger">*</span>
                                </label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="" selected disabled>Selectionner</option>
                                    <option value="masculin">Masculin</option>
                                    <option value="feminin">Feminin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birth_date" class="form-label"> <b>Date de naissance : <span class="danger">*</span></b>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="birth_date" id="birth_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="telephone" class="form-label"> <b>Téléphone : <span class="danger">*</span></b> </label>
                                <div class="d-flex">
                                    <span class="form-control w-80 text-center align-center" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                    <input type="text" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;" min="10" max="10" name="telephone" id="telephone" class="form-control" autofocus placeholder="0101010101" data-inputmask="'mask': ['9999999999', '99 99 99 99 99']" data-mask="">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="contact2" class="form-label"> <b>N° Téléphone 2 : </b> </label>
                                <div class="d-flex">
                                    <span class="form-control w-80 text-center align-center"
                                        style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                    <input type="text"
                                        style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                        min="10" max="10" name="contact2" id="contact2" class="form-control"
                                        autocomplete="contact2" autofocus placeholder="0707000000"
                                        data-inputmask="'mask': ['9999999999', '99 99 99 99 99']" data-mask=""> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lieu_de_naissance" class="form-label"> <b>Lieu de naissance : <span class="danger">*</span></b> </label>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" name="lieu_de_naissance" id="lieu_naissance"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="residence_habituelle" class="form-label"> <b>Lieu de résidence
                                        habituelle : <span class="danger">*</span></b> </label>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" name="residence_habituelle" id="residence_habituelle"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="residence_actuelle" class="form-label"> <b>Lieu de résidence
                                        actuelle : </b> <span class="danger">*</span> </label>
                                <div class="input-group mb-3">
                                    <select class="form-control select2" id="residence_actuelle" name="residence_actuelle"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body ribbon-box">
                <div class="ribbon ribbon-danger rounded5">Renseignements Administratifs du Patient</div>
                <br/><br/><br/>
                <div class="box bb-3 border-info p-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="situation_matrimoniale" class="form-label"> <b> Situation Matrimoniale: </b> <span class="danger">*</span></label>
                                <select class="form-select" id="situation_matrimoniale" name="situation_matrimoniale">
                                    <option value="" selected disabled>Selectionner</option>
                                    <option value="celibataire">Celibataire</option>
                                    <option value="marie(e)">Marié(e)</option>
                                    <option value="divorce(e)">Divorcé(e)</option>
                                    <option value="Concubinage">Concubinage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pays" class="form-label"> <b> Pays de naissance: </b> <span class="danger">*</span></label>
                                <select class="form-select" id="pays" name="pays">
                                    <option value="" selected disabled>Selectionner</option>
                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                    <option value="autre">Autre</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4" id="precision">
                            <div class="form-group">
                                <label for="autre_pays" class="form-label"> <b>Precisez le pays : </b> <span class="danger">*</span> </label>
                                <select name="autre_pays" id="autre_pays" class="form-control select2" style="width: 100%"> </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profession" class="form-label"> <b>Profession: </b> </label>
                                <select class="form-control select2" name="profession" id="profession">
                                    <option value="" selected disabled>Selectionner</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nbre_enfant" class="form-label"> <b>Nombre d'enfant: </b> </label>
                                <select class="form-select" name="nbre_enfant" id="nbre_enfant">
                                    <option value="" selected disabled>Selectionner</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row mb-10">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type_piece" class="form-label"> <b>Type de pièce d'identité: </b>
                                    <span class="danger">*</span></label>
                                <select class="form-select" id="type_piece" name="type_piece">
                                    <option value="" disabled selected>Selectionner</option>
                                    <option value="CNI">CNI (Carte d'Identité Nationale)</option>
                                    <option value="Attestation identite">Attestation d'Identité</option>
                                    <option value="Passeport">Passeport</option>
                                    <option value="Carte consulaire">Carte Consulaire</option>
                                    <option value="Permis de conduire">Permis de conduire</option>
                                    <option value="Pas de pièce">Pas de pièce</option>
                                    <option value="Autre">Autre</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4" id="no_piece">
                            <div class="form-group">
                                <label for="numero_identite" class="form-label"> <b>N° Pièce d'identité: </b>
                                </label>
                                <input type="text" class="form-control" name="numero_identite" id="numero_identite"
                                    placeholder="CI12899312AP002">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ethnie" class="form-label"> <b>Ethnie: </b>
                                    <span class="danger">*</span></label>
                                <select class="form-control select2" id="ethnie" name="ethnie">
                                    <option value="" disabled selected>Selectionner</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nom_personne_cas_urgence" class="form-label"> <b>Nom & Prénom en cas
                                        d'urgence : </b></label>
                                <input type="text" class="form-control" name="nom_personne_cas_urgence" id="nom_personne_cas_urgence">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telephone_personne_cas_urgence" class="form-label"> <b>Téléphone en
                                        cas d'urgence : </b></label>
                                <input type="text" class="form-control" name="telephone_personne_cas_urgence" id="telephone_personne_cas_urgence">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lien_personne_cas_urgence" class="form-label"> <b>Lien personne en cas
                                        d'urgence: </b></label>
                                <input type="text" class="form-control" name="lien_personne_cas_urgence" id="lien_personne_cas_urgence">

                            </div>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
            <!-- Step 3 -->
            <div class="row mt-20" id="questAdd">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="fonction" class="form-label"> <b>Voulez-vous affecter le Patient: </b>  </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="c-inputs-stacked" id="admission_patient">
                                <input type="radio" id="Ad01" value="Oui" name="admission_patient">
                                <label for="Ad01" class="me-30">Oui</label>
                                <input type="radio" id="Ad02" value="Non" name="admission_patient">
                                <label for="Ad02" class="me-30">Non</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="admissionForm">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info rounded5">Affectation du patient</div>
                    <br/><br/><br/>
                    <div class="box bb-3 border-dark p-10">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <input type="hidden" name="type_admission_id" value="Consultation" />
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="service_id" class="form-label fw-bold"> Service : <span class="danger">*</span> </label>
                                                    <select class="form-select" id="service_id" name="service_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="prestation_service_id" class="form-label fw-bold">Prestation de service : <span class="danger">*</span> </label>
                                                    <select class="form-select" id="prestation_service_id" name="prestation_service_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="infirmier_id" class="form-label fw-bold"> Infirmier : <span class="danger">*</span> </label>
                                                    <select class="form-select" id="infirmier_id" name="infirmier_id" style="width: 100%;">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="formDoctor">
                                                <div class="form-group">
                                                    <label for="doctor_id" class="form-label fw-bold"> Médecin en charge : </label>
                                                    <select class="form-select" id="doctor_id" name="doctor_id" style="width: 100%;">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="fonction" class="form-label"> <b>Mode d'entrée: </b>  </label>
                                                        <div class="c-inputs-stacked">
                                                            <input type="radio" id="E07" value="Venue lui même" name="mode_entree">
                                                            <label for="E07" class="me-30">Venue lui même</label>
                                                            <input type="radio" id="E06" value="Référée par un centre de santé" name="mode_entree">
                                                            <label for="E06" class="me-30">Référée par un centre de santé</label>
                                                            <input type="radio" id="E05" value="Référée par un tradipraticien" name="mode_entree">
                                                            <label for="E05" class="me-30">Référée par un tradipraticien</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="motif_consultation" class="form-label fw-bold">Motif de la visite : <span class="danger">*</span></label>
                                                    <textarea class="form-control" id="motif_consultation" name="motif_consultation" placeholder="motif de consultation" rows="4" maxlength="150"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group float-end">
                                            <label for="fonction" class="form-label text-danger"> <b>Gratuité(GTC): </b>  </label>
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" id="GR05" value="gratuit" name="gratuite">
                                                <label for="GR05" class="me-30">Cochez la case</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="float-end">
                    <button type="button" class="btn btn-warning me-1">
                        <i class="ti-trash"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-save-alt"></i> Enregister
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
const serviceId = document.getElementById("service_id")
const formDoctor = document.getElementById("formDoctor")
formDoctor.style.display = "block";

serviceId.addEventListener("change", function(e) {
    if (serviceId.value == '4') {
        formDoctor.style.display = "none";

    } else {
        formDoctor.style.display = "block";
    }

});
// pays
const country = document.getElementById("pays")
const precision = document.getElementById("precision")
precision.style.display = "none";
document.getElementById('autre_pays').value = "Côte d'Ivoire";

country.addEventListener("change", function(e) {
    if (country.value == 'autre') {
        precision.style.display = "block";
        document.getElementById('autre_pays').value = "";

    } else {
        precision.style.display = "none";
        document.getElementById('autre_pays').value = "Côte d'Ivoire";

    }

});
 /** validation patient **/
const admAdd = document.querySelectorAll('input[type=radio][name="admission_patient"]');
const admissionForm = document.getElementById('admissionForm')

admissionForm.style.display = 'none';

Array.prototype.forEach.call(admAdd, function(radio) {
    radio.addEventListener('change', changeHandlerAM);
});

function changeHandlerAM(event) {
    if (this.value == 'Oui') {
        admissionForm.style.display = 'block';
    } else {
        admissionForm.style.display = 'none';
    }
}

$(document).ready(function(){
    $('#formAdd').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('secretariat.patient.addpatient') }}",
            method: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    text: response.success,
                    icon: "success",
                    button: "ok",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#F7B662',
                    showCancelButton: true,
                    cancelButtonText: "<a class='text-white' href='{{ route('secretariat.patient.list') }}'><i class='fa fa-eye'></i>&nbsp;Voir la liste</a>",
                    confirmButtonText:"<a class='text-white' href='{{ route('dashboard') }}'><i class='ti-save-alt'></i>&nbsp;Tableau de bord</a>",
                    reverseButtons: true,
                });
                $('#formAdd')[0].reset();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                for (var key in errors) {
                    var errorMessage = errors[key][0];
                    var inputElement = document.getElementById(key);
                    var inputElements = document.querySelectorAll('.form-control');
                    if (inputElement) {
                        var errorContainer = inputElement.closest('.form-group');
                        var errorSpan = document.createElement('span');
                        errorSpan.className = 'text-danger';
                        errorSpan.textContent = errorMessage;
                        if (errorMessage) {
                            errorContainer.appendChild(errorSpan);
                        }
                    }

                    var radioElements = document.querySelectorAll('.c-inputs-stacked'); // Sélectionnez tous les champs radio
                    radioElements.forEach(function(radioElement) {
                        radioElement.addEventListener('click', function() {
                            var errorContainer = radioElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });
                    var selectElements = document.querySelectorAll('.form-select'); // Sélectionnez tous les champs select
                    selectElements.forEach(function(selectElement) {
                        selectElement.addEventListener('click', function() {
                            var errorContainer = selectElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant
                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });

                    inputElements.forEach(function(inputElement) {
                        inputElement.addEventListener('click', function() {
                            var errorContainer = inputElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });

                        inputElement.addEventListener('input', function() {
                            var errorContainer = inputElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });
                }
                var errorMessage = '';
                for (var key in errors) {
                    errorMessage += errors[key][0] + '<br/>';
                }
                if (errors) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur de validation',
                        html: '<div class="text-danger">' + errorMessage + '</div>', // Added '+' operator here
                    });
                }
            }
        });
    });
});

    $(document).ready(function() {
        $('#prestation_service_id').change(function() {
            var prestationDoctor = $(this).val();
            var doctorlist = $('#doctor_id');
            doctorlist.empty();
            doctorlist.append('<option value="">Selectionner</option>');
            if (prestationDoctor) {
                $.ajax({
                    url: '{{ route("secretariat.doctors", ":id") }}'.replace(':id', prestationDoctor),
                    type: 'GET',
                    success: function(response) {
                        //console.log(response);
                        $.each(response, function(key, prestation) {
                            doctorlist.append('<option value="' + prestation.doctor.id + '">' + prestation.doctor.user.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('#service_id').change(function() {
            var service = $(this).val();
            var prestationlist = $('#prestation_service_id');
            prestationlist.empty();
            prestationlist.append('<option value="">Selectionner</option>');
            if (service) {
                $.ajax({
                    url: '{{ route("secretariat.prestations", ":id") }}'.replace(':id', service),
                    type: 'GET',
                    success: function(response) {
                        $.each(response, function(key, prestation) {
                            prestationlist.append('<option value="' + prestation.id + '">' + prestation.prestation_service.libelle + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('#service_id').change(function() {
            var service = $(this).val();
            var infirmierlist = $('#infirmier_id');
            infirmierlist.empty();
            infirmierlist.append('<option value="">Selectionner</option>');
            if (service) {
                $.ajax({
                    url: '{{ route("secretariat.infirmiers", ":id") }}'.replace(':id', service),
                    type: 'GET',
                    success: function(response) {
                        $.each(response, function(key, infirmier) {
                            infirmierlist.append('<option value="' + infirmier.id + '">' + infirmier.user.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('#prestation_service_id').change(function() {
            var prestationServiceId = $(this).val();
            $.ajax({
                url: "{{ route('secretariat.prix_prestation') }}",
                method: 'GET',
                data: { prestationServiceId: prestationServiceId },
                success: function(response) {
                    var prix = response.prix;
                    $('#prix').text('Prix : ' + prix.toFixed(2) + ' Frs CFA');
                    $('#montant').val(response.prix);
                },
                error: function() {
                    $('#prix').val('Erreur lors de la récupération du prix.');
                }
            });
        });
    });

/// Regions , Ville , commune ...

    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.lieu_naissance') }}",
            method: 'GET',
            success: function(response) {
                var lieu_naissancelist = $('#lieu_naissance');
                lieu_naissancelist.empty();
                lieu_naissancelist.append('<option value="" >Selectionner</option>');

                $.each(response, function(key, lieu_naissance) {
                    lieu_naissancelist.append('<option value="' + lieu_naissance.id + '">' + lieu_naissance.name + '</option>');
                });
            },
            error: function(xhr) {
            }
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_actuelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_habituellelist = $('#residence_habituelle');
                residence_habituellelist.empty();
                residence_habituellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_habituelle) {
                    residence_habituellelist.append('<option value="' + residence_habituelle.id + '">' + residence_habituelle.name + '</option>');
                });
            },
            error: function(xhr) {
            }
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_actuelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_actuellelist = $('#residence_actuelle');
                residence_actuellelist.empty();
                residence_actuellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_actuelle) {
                    residence_actuellelist.append('<option value="' + residence_actuelle.id + '">' + residence_actuelle.name + '</option>');
                });
            },
            error: function(xhr) {
            }
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_habituelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_habituellelist = $('#residence_habituelle');
                residence_habituellelist.empty();
                residence_habituellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_habituelle) {
                    residence_habituellelist.append('<option value="' + residence_habituelle.id + '">' + residence_habituelle.name + '</option>');
                });
            },
            error: function(xhr) {
            }
        });
    });
// Recuperation Services, Prestations de services, Infirmiers et Medecins //

    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.hopitalservices') }}",
            method: 'GET',
            success: function(response) {
                var servicelist = $('#service_id');
                servicelist.empty();
                servicelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, service) {
                    servicelist.append('<option value="' + service.service.libelle + '">' + service.service.libelle + '</option>');
                });
            },
            error: function(xhr) {
            }
        });
    });

/// Liste des pays du monde //
// Chargez le fichier JSON
    fetch('{{ asset("assets/src/countries-FR.json") }}')
    .then(response => response.json())
    .then(data => {
        const selectPays = document.getElementById('autre_pays');
        for (const code in data) {
            const nom = data[code];
            const option = document.createElement('option');
            option.value = nom;
            option.textContent = nom;
            selectPays.appendChild(option);
        }
    })
    .catch(error => console.error('Erreur de chargement du fichier JSON :', error));


    fetch('{{ asset("assets/src/profession.json") }}')
    .then(response => response.json())
    .then(data => {
        const selectProfession = document.getElementById('profession');
        for (const libelle in data) {
            const nom = data[libelle];
            const option = document.createElement('option');
            option.value = nom;
            option.textContent = nom;
            selectProfession.appendChild(option);
        }
    })
    .catch(error => console.error('Erreur de chargement du fichier JSON :', error));

    fetch('{{ asset("assets/src/ethnies.json") }}')
    .then(response => response.json())
    .then(data => {
        const selectEthnie = document.getElementById('ethnie');
        for (const libelle in data) {
            const nom = data[libelle];
            const option = document.createElement('option');
            option.value = nom;
            option.textContent = nom;
            selectEthnie.appendChild(option);
        }
    })
    .catch(error => console.error('Erreur de chargement du fichier JSON :', error));
</script>
<style>
    .select2-selection{
        height: 34px !important;
    }
</style>
