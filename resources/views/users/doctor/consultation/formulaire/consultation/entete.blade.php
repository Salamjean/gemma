<div class="container">
    <div class="box bb-3 border pe-5 pb-20 px-20 ps-10 pt-20 bg-color">
        <div class="row">
            <div class="col-md-2">
                <div class="d-flex justify-content-center align-items-center">
                    @if ($consultation->admission->patient->img_url != null)
                    <img src="{{ asset('assets/uploads/patient/' . $consultation->admission->patient->img_url) }}"
                        class="rounded-circle" alt="Photo de profil" style="width:128px; height:128px" />
                @else
                    @if ($consultation->admission->patient->gender == 'masculin')
                        <img src="{{ asset('assets/images/avatar/6.png') }}" class="rounded-circle"
                            alt="Photo de profil" />
                    @else
                        <img src="{{ asset('assets/images/avatar/2.png') }}" class="rounded-circle"
                            alt="Photo de profil" />
                    @endif
                @endif
                </div>
            </div>
            <div class="col-md-10">
                <div class="px-2">
                    <div class="px-5 bg-color">
                        <div class="row">
                            <div class="d-flex justify-content-between mt-10">
                                <div class="">
                                    <label class="form-label">N° Dossier médical | <span class="fw-bold fs-18"><span id="dm_patient"
                                                style="color:red;">{{ $consultation->admission->patient->code_patient }}</span></span></label>
                                </div>
                                <div class="d-flex items-center pb-1">

                                    <span class=" d-flex mt-1 text-success">
                                        <span>Consultation du {{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                        <pre>  </pre> |
                                        <pre>  </pre> <span>Ordre
                                            N°{{ noOrdreConsultation() }}</span>
                                        <pre>  </pre>
                                    </span>
                                    <a href="" title="dossier medical" class="btn btn-sm  btn-secondary mx-1"
                                        target="_blank"><i class="fa-solid fa-print"></i></a>
                                    <a href={{ route('doctor.patient.detail', $consultation->patient->id) }}" title="info patient"
                                        class="btn btn-sm  btn-success mx-1" target="_blank"><i class="fa-solid fa-info"></i></a>
                                </div>
                            </div>
                            <hr>
                            @php
                                $agePatient = \Carbon\Carbon::createFromFormat('d/m/Y', $consultation->patient->birth_date);
                                $age = $agePatient->diffInYears(Carbon\Carbon::now());
                            @endphp
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="form-label"> <b>Nom complet </b> </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $consultation->admission->patient->user->name }} {{ $consultation->admission->patient->user->prenom }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="birth_date" class="form-label"> <b>Né(e) le</b></label>
                                    <input type="text" class="form-control" id="birth_date" name="birth_date"
                                        value="{{ $consultation->admission->patient->birth_date }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="age" class="form-label"> <b>Age </b></label>
                                    <input type="text" class="form-control" id="age" name="age"
                                        value="{{ $age }} ans" disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="gender" class="form-label"> <b>Sexe </b></label>
                                    <input type="text" class="form-control" id="gender" name="gender"
                                        value="{{ $consultation->admission->patient->gender }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><b>Résidence Actuelle</b></label>
                                <input type="text" class="form-control"
                                    value="{{ $consultation->admission->patient->residenceActuelle->name }}" readonly />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><b>Profession</b></label>
                                <input type="text" class="form-control"
                                    value="{{ $consultation->admission->patient->profession }}"
                                    readonly />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label"><b>Contact</b></label>
                                <input type="text" class="form-control"
                                    value="{{ $consultation->admission->patient->telephone }}" readonly />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label"><b>N° Assurance</b></label>
                                <input type="text" class="form-control"
                                    value="{{ $consultation->admission->patient->no_assurance }}" readonly />
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <h5 class="fw-400 mb-5 mt-5">Constantes physiques du patient | Infirmier : <span class=" text-success">
                            {{ $consultation->infirmier->user->name }}</span> </h5>
                    <hr>
                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="poids" class="form-label"> <b>Poids</b></label>
                                <input type="text" class="form-control" id="poids" name="poids"
                                    value="{{ $consultation->poids }}" placeholder="Kg">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="taille" class="form-label"> <b>Taille</b></label>
                                <input type="text" class="form-control" id="taille" name="taille" value="{{ $consultation->taille }}"
                                    placeholder="0.00" pattern="\d+(\.\d{1,2})?" title="Veuillez saisir un nombre avec jusqu'à deux décimales">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="imc" class="form-label"><b>IMC</b></label>
                                <input type="text" class="form-control" id="imc" name="imc"
                                value="{{ $consultation->imc }}" placeholder="Kg/m²" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="temperature" class="form-label"> <b>Temp(°C)</b></label>
                                <input type="text" class="form-control" id="temperature" name="temperature"
                                    value="{{ $consultation->temperature }}" placeholder="°C">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tension_arterielle" class="form-label"> <b>TA</b></label>
                                <input type="text"
                                    class="form-control @error('tension_arterielle') is-invalid @enderror"
                                    id="tension_arterielle" value="{{ $consultation->tension_arterielle }}"
                                    name="tension_arterielle" placeholder="mmHg">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="pouls" class="form-label"> <b>Pouls</b></label>
                                <input type="text" class="form-control @error('pouls') is-invalid @enderror"
                                    id="pouls" name="pouls" value="{{ $consultation->pouls }}"
                                    placeholder="batt/mn">
                            </div>
                        </div>
                        <div class="col-md-12 pt-4">
                                <label class="form-label"><b>Motif de la consultation | description du mal</b></label>
                                <textarea type="text" class="form-control" name="motif_consultation" id="motif_consultation">{{ $consultation->registre == null ? $consultation->admission->motif_consultation : $consultation->motif_consultation }}</textarea>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Sélection des champs poids, taille et IMC
 const poidsInput = document.getElementById('poids');
 const tailleInput = document.getElementById('taille');
 const imcInput = document.getElementById('imc');

 // Fonction pour calculer l'IMC
 function calculerIMC() {
     const poids = parseFloat(poidsInput.value);
     const taille = parseFloat(tailleInput.value) / 100.0;

     if (!isNaN(poids) && !isNaN(taille) && taille > 0) {
         const imc = poids / (taille * taille);
         imcInput.value = imc.toFixed(2); // Afficher l'IMC avec deux décimales
     } else {
         imcInput.value = ''; // Réinitialiser le champ IMC si les valeurs ne sont pas valides
     }
 }

 // Écouter les événements de changement dans les champs Poids et Taille
 poidsInput.addEventListener('input', calculerIMC);
 tailleInput.addEventListener('input', calculerIMC);

 </script>