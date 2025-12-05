<div class="row">
    <div class="col-12">
        <!-- Recherche patient -->
        <div class="box bb-3 border-danger">
            <div class="box-header with-border">
                <div>
                    <h4 class="box-title fw-bold fs-28">Enregistrement d'un nouveau patient</h4>
                    <h6 class="box-subtitle">Avant d'enregistrer un nouveau patient, vous pouvez vérifier si le patient
                        est déjà enregistré et faire la mise à jour .</h6>
                    <div class="float-end">
                        <a href="{{ route('secretariat.patient.create')}}">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un nouveau</button>
                        </a>
                    </div>
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
        <div class="p-40 p-search">
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
                                    <button type="button" id="search-button" class="btn btn-dark h-50"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="resultat-recherche-patient"></div>

        <div id="update-form" style="display: none;">
            
            <div class="container">
                <form id="editPatient">
                    @csrf
                    <input type="hidden" name="id" id="patient_id" />
                    <div class="mont-aff border-dark">
                        <label class="title mb-4">Montant à payer à la Caisse</label>
                        <h3 class="box-title">
                            <input type="hidden" class="form-control" name="montant" id="montant_up">
                            <b id="prix_up"> 0 Frs CFA</b>
                        </h3>
                    </div>
                    <br /><br />
                    <!-- Step 1 -->
                    <div class="box bb-3 border-warning pe-95 pb-20 ps-95 pt-20 bg-color">
                        <div class="box-body ribbon-box">
                            <div class="ribbon ribbon-dark rounded5">Données sur le Patient</div>
                            <br /><br /><br />
                            <div class="box bb-3 border-danger p-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> <b>Nom : </b> <span
                                                    class="danger">*</span> </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                                <input type="text" name="name_up" class="form-control"
                                                    placeholder="Nom" id="name_up" oninput="convertToUppercase()">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="prenom" class="form-label"> <b>Prénom(s) : </b> <span
                                                    class="danger">*</span> </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                                <input type="text" name="prenom_up" class="form-control"
                                                    placeholder="Prénom(s)" id="prenom_up"
                                                    oninput="convertToUppercase()">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="form-label"> <b>E-mail : </b> </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="ti-email"></i></span>
                                                <input type="email" name="email_up" class="form-control"
                                                    id="email_up" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="gender" class="form-label"> <b>Sexe : </b> <span
                                                    class="danger">*</span>
                                            </label>
                                            <input class="form-control" id="gender_up" name="gender_up" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date" class="form-label"> <b>Date de naissance : <span
                                                        class="danger">*</span></b>
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="birth_date_up" id="birth_date_up"
                                                    class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'"
                                                    data-mask="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telephone" class="form-label"> <b>Téléphone : <span
                                                        class="danger">*</span></b> </label>
                                            <div class="d-flex">
                                                <span class="form-control w-80 text-center align-center"
                                                    style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                                <input type="text"
                                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                                    min="10" max="10" name="telephone" id="telephone"
                                                    class="form-control" autofocus placeholder="0101010101"
                                                    data-inputmask="'mask': ['9999999999', '99 99 99 99 99']"
                                                    data-mask="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="contact2" class="form-label"> <b>N° Téléphone 2 : </b>
                                            </label>
                                            <div class="d-flex">
                                                <span class="form-control w-80 text-center align-center"
                                                    style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                                <input type="text"
                                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                                    min="10" max="10" name="contact2_up"
                                                    id="contact2_up" class="form-control" autocomplete="contact2"
                                                    autofocus placeholder="0707000000"
                                                    data-inputmask="'mask': ['9999999999', '99 99 99 99 99']"
                                                    data-mask="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lieu_de_naissance" class="form-label"> <b>Lieu de naissance :
                                                    <span class="danger">*</span></b> </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i
                                                        class="fa-solid fa-location-dot"></i></span>
                                                <input type="text" class="form-control" name="lieu_naissance_up"
                                                    id="lieu_naissance_up" placeholder="Lieu de naissance">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="residence_habituelle" class="form-label"> <b>Lieu de résidence
                                                    habituelle : <span class="danger">*</span></b> </label>
                                            <div class="input-group mb-3">
                                                <select class="form-control select2" name="residence_habituelle_up"
                                                    id="residence_habituelle_up" style="width: 100%"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="residence_actuelle" class="form-label"> <b>Lieu de résidence
                                                    actuelle : </b> <span class="danger">*</span> </label>
                                            <div class="input-group mb-3">
                                                <select class="form-control select2" id="residence_actuelle_up"
                                                    name="residence_actuelle_up" style="width: 100%"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body ribbon-box">
                            <div class="ribbon ribbon-danger rounded5">Renseignements Administratifs du Patient</div>
                            <br /><br /><br />
                            <div class="box bb-3 border-info p-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="situation_matrimoniale" class="form-label"> <b> Situation
                                                    Matrimoniale: </b> <span class="danger">*</span></label>
                                            <select class="form-select" id="situation_matrimoniale_up"
                                                name="situation_matrimoniale_up">
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
                                            <label for="pays" class="form-label"> <b> Pays de naissance: </b>
                                                <span class="danger">*</span></label>
                                            <input type="text" class="form-control" id="pays_up"
                                                name="pays_up" />
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="precision_up">
                                        <div class="form-group">
                                            <label for="autre_pays" class="form-label"> <b>Precisez le pays : </b>
                                                <span class="danger">*</span> </label>
                                            <select name="autre_pays_up" id="autre_pays_up"
                                                class="form-control select2" style="width: 100%"> </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="profession_up" class="form-label"> <b>Profession: </b>
                                            </label>
                                            <select class="form-control select2" name="profession_up"
                                                id="profession_up" style="width: 100%">
                                                <option value="" selected disabled>Selectionner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nbre_enfant_up" class="form-label"> <b>Nombre d'enfant: </b>
                                            </label>
                                            <select class="form-select" name="nbre_enfant_up" id="nbre_enfant_up">
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
                                            <label for="type_piece_up" class="form-label"> <b>Type de pièce
                                                    d'identité: </b>
                                                <span class="danger">*</span></label>
                                            <select class="form-select" id="type_piece_up" name="type_piece_up">
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
                                            <label for="numero_identite" class="form-label"> <b>N° Pièce d'identité:
                                                </b>
                                            </label>
                                            <input type="text" class="form-control" name="numero_identite_up"
                                                id="numero_identite_up" placeholder="CI12899312AP002">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ethnie" class="form-label"> <b>Ethnie: </b>
                                                <span class="danger">*</span></label>
                                            <input class="form-control" id="ethnie_up" name="ethnie_up" readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nom_personne_cas_urgence" class="form-label"> <b>Nom & Prénom
                                                    en cas
                                                    d'urgence : </b></label>
                                            <input type="text" class="form-control"
                                                name="nom_personne_cas_urgence_up" id="nom_personne_cas_urgence_up">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telephone_personne_cas_urgence" class="form-label">
                                                <b>Téléphone en
                                                    cas d'urgence : </b></label>
                                            <input type="text" class="form-control"
                                                name="telephone_personne_cas_urgence_up"
                                                id="telephone_personne_cas_urgence_up">

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lien_personne_cas_urgence" class="form-label"> <b>Lien
                                                    personne en cas
                                                    d'urgence: </b></label>
                                            <input type="text" class="form-control"
                                                name="lien_personne_cas_urgence_up" id="lien_personne_cas_urgence_up">

                                        </div>
                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="row mt-20" id="questAddUp">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="fonction" class="form-label"> <b>Voulez-vous affecter le Patient:
                                            </b> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="c-inputs-stacked" id="admission_patient_up">
                                            <input type="radio" id="AdU01" value="Oui"
                                                name="admission_patient_up">
                                            <label for="AdU01" class="me-30">Oui</label>
                                            <input type="radio" id="AdU02" value="Non"
                                                name="admission_patient_up">
                                            <label for="AdU02" class="me-30">Non</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="admissionFormUp">
                            <div class="box-body ribbon-box">
                                <div class="ribbon ribbon-info rounded5">Affectation du patient</div>
                                <br /><br /><br />
                                <div class="box bb-3 border-dark p-10">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <input type="hidden" name="type_admission_id"
                                                    value="Consultation" />
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="service_id" class="form-label fw-bold">
                                                                    Service : <span class="danger">*</span> </label>
                                                                <select class="form-select" id="service_id_up"
                                                                    name="service_id"> </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="prestation_service_id"
                                                                    class="form-label fw-bold">Prestation de service :
                                                                    <span class="danger">*</span> </label>
                                                                <select class="form-select"
                                                                    id="prestation_service_id_up"
                                                                    name="prestation_service_id"> </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="infirmier_id" class="form-label fw-bold">
                                                                    Infirmier : <span class="danger">*</span> </label>
                                                                <select class="form-select" id="infirmier_id_up"
                                                                    name="infirmier_id" style="width: 100%;">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" id="formDoctorUp">
                                                            <div class="form-group">
                                                                <label for="doctor_id" class="form-label fw-bold">
                                                                    Médecin en charge : </label>
                                                                <select class="form-select" id="doctor_id_up"
                                                                    name="doctor_id" style="width: 100%;"> </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="fonction" class="form-label"> <b>Mode
                                                                            d'entrée: </b> </label>
                                                                    <div class="c-inputs-stacked">
                                                                        <input type="radio" id="EU07"
                                                                            value="Venue lui même" name="mode_entree">
                                                                        <label for="EU07" class="me-30">Venue lui
                                                                            même</label>
                                                                        <input type="radio" id="EU06"
                                                                            value="Référée par un centre de santé"
                                                                            name="mode_entree">
                                                                        <label for="EU06" class="me-30">Référée
                                                                            par un centre de santé</label>
                                                                        <input type="radio" id="EU05"
                                                                            value="Référée par un tradipraticien"
                                                                            name="mode_entree">
                                                                        <label for="EU05" class="me-30">Référée
                                                                            par un tradipraticien</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="motif_consultation"
                                                                    class="form-label fw-bold">Description de la visite
                                                                    ou du mal : <span class="danger">*</span></label>
                                                                <textarea class="form-control" id="motif_consultation" name="motif_consultation" placeholder="motif de consultation"
                                                                    rows="4" maxlength="150"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group float-end">
                                                        <label for="gratuite" class="form-label text-danger">
                                                            <b>Gratuité(GTC): </b> </label>
                                                        <div class="c-inputs-stacked">
                                                            <input type="checkbox" id="GRU05" value="gratuit"
                                                                name="gratuite">
                                                            <label for="GRU05" class="me-30">Cochez la
                                                                case</label>
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
                                    <i class="ti-save-alt"></i> Mettre à jour
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
{{--         <div id="addPatient" style="display: none;">
        
                @include('users.secretariat.patient._inc.add')
            </div> --}}


    </div>
</div>

<script src="{{ asset('assets/src/js/secretariat.js') }}"></script>
<style>
    .f-right {
        float: right;
    }

    .p-search {
        background-image: url("{{ asset('assets/images/bg/bg-search.png') }}");
        border-radius: 10px;
        margin: 10px auto;
    }

    .btn-submit {
        float: right;
    }

    .select2-selection {
        height: 34px !important;
        width: 100%;
    }
</style>
<script>
    const serviceIdUp = document.getElementById("service_id_up")
    const formDoctorUp = document.getElementById("formDoctorUp")
    formDoctorUp.style.display = "block";

    serviceIdUp.addEventListener("change", function(e) {
        console.log(serviceIdUp.value)
        if (serviceIdUp.value == 'Soins infirmier') {
            formDoctorUp.style.display = "none";

        } else {
            formDoctorUp.style.display = "block";
        }

    });
    // pays
    const countryUp = document.getElementById("pays_up")
    const precisionUp = document.getElementById("precision_up")
    precisionUp.style.display = "none";
    document.getElementById('autre_pays_up').value = "Côte d'Ivoire";

    countryUp.addEventListener("change", function(e) {
        if (countryUp.value == 'autre') {
            precisionUp.style.display = "block";
            document.getElementById('autre_pays_up').value = "";

        } else {
            precisionUp.style.display = "none";
            document.getElementById('autre_pays_up').value = "Côte d'Ivoire";

        }

    });
    /** validation patient **/
    const admAddUp = document.querySelectorAll('input[type=radio][name="admission_patient_up"]');
    const admissionFormUp = document.getElementById('admissionFormUp')

    admissionFormUp.style.display = 'none';

    Array.prototype.forEach.call(admAddUp, function(radio) {
        radio.addEventListener('change', changeHandlerAMUp);
    });

    function changeHandlerAMUp(event) {
        if (this.value == 'Oui') {
            admissionFormUp.style.display = 'block';
        } else {
            admissionFormUp.style.display = 'none';
        }
    }

    const addPatient = document.getElementById('addPatient');
    const updateForm = document.getElementById('update-form');
    const resultatSearch = document.getElementById('resultat-recherche-patient');

    updateForm.style.display = 'none';

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

    function showUpdateForm(patientId) {
        // Fetch patient details using AJAX and populate the update form
        $.ajax({
            url: "{{ route('secretariat.patient.showpatient', ['id' => ':id']) }}".replace(':id', patientId),
            method: 'GET',
            data: {
                patient_id: patientId
            },
            success: function(response) {
                var patient = response.patient;
                //console.log(patient);
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
                $('#residence_habituelle_up').val(patient.residence_habituelle.name);
                $('#residence_actuelle_up').val(patient.residence_actuelle.name);
                $('#temperature_up').val(patient.temperature);
                $('#situation_matrimoniale_up').val(patient.situation_matrimoniale);
                $('#address_up').val(patient.address);
                $('#ethnie_up').val(patient.ethnie);
                $('#lieu_naissance_up').val(patient.lieu_naissance.name);
                $('#nbre_enfant_up').val(patient.nbre_enfant);
                $('#nom_personne_cas_urgence_up').val(patient.nom_personne_cas_urgence);
                $('#telephone_personne_cas_urgence_up').val(patient.telephone_personne_cas_urgence);
                $('#lien_personne_cas_urgence_up').val(patient.lien_personne_cas_urgence);

                // Champs modifiable //
                //$('#telephone_up').prop('readonly', false);
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
                    if ($(this).val() === patient.residence_habituelle.name) {
                        $(this).prop('selected', true);
                    }
                });
                $('#residence_actuelle_up option').each(function() {
                    if ($(this).val() === patient.residence_actuelle.name) {
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
                    if ($(this).val() === patient.situation_matrimoniale) {
                        $(this).prop('selected', true);
                    }
                });

                updateForm.style.display = 'block';
            }
        });
    }
    $('#editPatient').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var patientId = $('#patient_id').val();

        $.ajax({
            url: "{{ route('secretariat.patient.updatepatient', ['id' => ':id']) }}".replace(':id',
                patientId),
            method: 'PUT',
            data: formData,
            success: function(response) {
                Swal.fire({
                    text: response.success,
                    icon: "success",
                    button: "ok",
                    confirmButtonColor: '#D7027B',
                    cancelButtonColor: '#005AEC',
                    showCancelButton: true,
                    cancelButtonText: "<a class='text-white' href='{{ route('secretariat.patient.list') }}'><i class='fa fa-eye'></i>&nbsp;Voir la liste</a>",
                    confirmButtonText: "<a class='text-white' href='{{ route('dashboard') }}'><i class='ti-save-alt'></i>&nbsp;Tableau de bord</a>",
                    reverseButtons: true,
                });
                $('#editPatient')[0].reset();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                for (var key in errors) {
                    var errorMessage = errors[key][0];
                    var inputElement = document.getElementById(key);
                    var inputElements = document.querySelectorAll(
                    '.form-control'); // Supposons que les IDs correspondent aux noms de champ

                    if (inputElement) {
                        var errorContainer = inputElement.closest(
                        '.form-group'); // Ajustez le sélecteur selon votre structure HTML
                        var errorSpan = document.createElement('span');
                        errorSpan.className = 'text-danger';
                        errorSpan.textContent = errorMessage;

                        if (errorMessage) {
                            errorContainer.appendChild(errorSpan);
                        }
                    }

                    var radioElements = document.querySelectorAll(
                    '.c-inputs-stacked'); // Sélectionnez tous les champs radio
                    radioElements.forEach(function(radioElement) {
                        radioElement.addEventListener('click', function() {
                            var errorContainer = radioElement.closest(
                            '.form-group');
                            var errorSpan = errorContainer.querySelector(
                                '.text-danger'
                                ); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(
                                errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });
                    var selectElements = document.querySelectorAll(
                    '.form-select'); // Sélectionnez tous les champs select
                    selectElements.forEach(function(selectElement) {
                        selectElement.addEventListener('click', function() {
                            var errorContainer = selectElement.closest(
                                '.form-group');
                            var errorSpan = errorContainer.querySelector(
                                '.text-danger'
                                ); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(
                                errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });

                    inputElements.forEach(function(inputElement) {
                        inputElement.addEventListener('click', function() {
                            var errorContainer = inputElement.closest(
                            '.form-group');
                            var errorSpan = errorContainer.querySelector(
                                '.text-danger'
                                ); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(
                                errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });

                        inputElement.addEventListener('input', function() {
                            var errorContainer = inputElement.closest(
                            '.form-group');
                            var errorSpan = errorContainer.querySelector(
                                '.text-danger'
                                ); // Sélectionner l'élément span d'erreur existant

                            if (errorSpan) {
                                errorContainer.removeChild(
                                errorSpan); // Supprimer l'élément span d'erreur existant
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
                        title: 'Erreur de validation', // Corrected spelling here
                        html: '<div class="text-danger">' + errorMessage +
                        '</div>', // Added '+' operator here
                    });
                }
            }

        });
    });

/*  $(document).ready(function() {
        
        $("#seeForm").click(function() {
        $("#addPatient").show();
        
        });
    });  */


    $(document).ready(function() {
        $('#prestation_service_id_up').change(function() {
            var prestationDoctor = $(this).val();
            var doctorlist = $('#doctor_id_up');
            doctorlist.empty();
            doctorlist.append('<option value="">Selectionner</option>');
            if (prestationDoctor) {
                $.ajax({
                    url: '{{ route('secretariat.doctors', ':id') }}'.replace(':id',
                        prestationDoctor),
                    type: 'GET',
                    success: function(response) {
                        //console.log(response);
                        $.each(response, function(key, prestation) {
                            doctorlist.append('<option value="' + prestation.doctor
                                .id + '">' + prestation.doctor.user.name +
                                '</option>');
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
        $('#service_id_up').change(function() {
            var service = $(this).val();
            var prestationlist = $('#prestation_service_id_up');
            prestationlist.empty();
            prestationlist.append('<option value="">Selectionner</option>');
            if (service) {
                $.ajax({
                    url: '{{ route('secretariat.prestations', ':id') }}'.replace(':id',
                        service),
                    type: 'GET',
                    success: function(response) {
                        $.each(response, function(key, prestation) {
                            prestationlist.append('<option value="' + prestation.id + '">' + prestation
                                .prestation_service.libelle + '</option>');
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
        $('#service_id_up').change(function() {
            var service = $(this).val();
            var infirmierlist = $('#infirmier_id_up');
            infirmierlist.empty();
            infirmierlist.append('<option value="">Selectionner</option>');
            if (service) {
                $.ajax({
                    url: '{{ route('secretariat.infirmiers', ':id') }}'.replace(':id', service),
                    type: 'GET',
                    success: function(response) {
                        $.each(response, function(key, infirmier) {
                            infirmierlist.append('<option value="' + infirmier.id +
                                '">' + infirmier.user.name + '</option>');
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
        $('#prestation_service_id_up').change(function() {
            var prestationServiceId = $(this).val();
            $.ajax({
                url: "{{ route('secretariat.prix_prestation') }}",
                method: 'GET',
                data: {
                    prestationServiceId: prestationServiceId
                },
                success: function(response) {
                    var prix = response.prix;
                    $('#prix_up').text('Prix : ' + prix.toFixed(2) + ' Frs CFA');
                    $('#montant_up').val(response.prix);
                },
                error: function() {
                    $('#prix_up').val('Erreur lors de la récupération du prix.');
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
                var lieu_naissancelist = $('#lieu_naissance_up');
                lieu_naissancelist.empty();
                lieu_naissancelist.append('<option value="" >Selectionner</option>');

                $.each(response, function(key, lieu_naissance) {
                    lieu_naissancelist.append('<option value="' + lieu_naissance.id + '">' +
                        lieu_naissance.name + '</option>');
                });
            },
            error: function(xhr) {}
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_actuelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_habituellelist = $('#residence_habituelle_up');
                residence_habituellelist.empty();
                residence_habituellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_habituelle) {
                    residence_habituellelist.append('<option value="' + residence_habituelle
                        .id + '">' + residence_habituelle.name + '</option>');
                });
            },
            error: function(xhr) {}
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_actuelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_actuellelist = $('#residence_actuelle_up');
                residence_actuellelist.empty();
                residence_actuellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_actuelle) {
                    residence_actuellelist.append('<option value="' + residence_actuelle
                        .id + '">' + residence_actuelle.name + '</option>');
                });
            },
            error: function(xhr) {}
        });
    });
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.residence_habituelle') }}",
            method: 'GET',
            success: function(response) {
                var residence_habituellelist = $('#residence_habituelle_up');
                residence_habituellelist.empty();
                residence_habituellelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, residence_habituelle) {
                    residence_habituellelist.append('<option value="' + residence_habituelle
                        .id + '">' + residence_habituelle.name + '</option>');
                });
            },
            error: function(xhr) {}
        });
    });
    // Recuperation Services, Prestations de services, Infirmiers et Medecins //

    $(document).ready(function() {
        $.ajax({
            url: "{{ route('secretariat.hopitalservices') }}",
            method: 'GET',
            success: function(response) {
                var servicelist = $('#service_id_up');
                servicelist.empty();
                servicelist.append('<option value="">Selectionner</option>');

                $.each(response, function(key, service) {
                    servicelist.append('<option value="' + service.service.libelle + '">' + service
                        .service.libelle + '</option>');
                });
            },
            error: function(xhr) {}
        });
    });

    /// Liste des pays du monde //
    // Chargez le fichier JSON
    fetch('{{ asset('assets/src/countries-FR.json') }}')
        .then(response => response.json())
        .then(data => {
            const selectPays = document.getElementById('autre_pays_up');
            for (const code in data) {
                const nom = data[code];
                const option = document.createElement('option');
                option.value = nom;
                option.textContent = nom;
                selectPays.appendChild(option);
            }
        })
        .catch(error => console.error('Erreur de chargement du fichier JSON :', error));


    fetch('{{ asset('assets/src/profession.json') }}')
        .then(response => response.json())
        .then(data => {
            const selectProfession = document.getElementById('profession_up');
            for (const libelle in data) {
                const nom = data[libelle];
                const option = document.createElement('option');
                option.value = nom;
                option.textContent = nom;
                selectProfession.appendChild(option);
            }
        })
        .catch(error => console.error('Erreur de chargement du fichier JSON :', error));

    fetch('{{ asset('assets/src/ethnies.json') }}')
        .then(response => response.json())
        .then(data => {
            const selectEthnie = document.getElementById('ethnie_up');
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
