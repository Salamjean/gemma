<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Identité de la mère</div>

                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Report N° Gestante :</b>
                                        </label>
                                        <input type="text" class="form-control" name="numero_gestante"
                                            id="numero_gestante"
                                            value="{{ $consultation->registre->registreAccouchement->numero_gestante }}"
                                            style="color: red;" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom : </b> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="name" class="form-control" placeholder="Nom"
                                                value="{{ $consultation->patient->user->name }}" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="prenom" class="form-label"> <b>Prénom(s) : </b> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="prenom" class="form-control"
                                                placeholder="Prénom(s)"
                                                value="{{ $consultation->patient->user->prenom }}" readonly>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Nationalite" class="form-label"> <b>Pays : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="country" class="form-control"
                                                placeholder="Pays d'origine"
                                                value="{{ $consultation->patient->country }}" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Ethnie :</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->origine }}"
                                            style="color: red;" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Mode d'entrée :</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->mode_entree }}"
                                            style="color: red;" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="residence_habituelle" class="form-label"> <b>Résidence
                                                habituelle : </b> </label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-street-view"></i></span>
                                            <input type="text" class="form-control" name="residence_habituelle"
                                                value="{{ $consultation->patient->habitualResidence->name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="residence_actuelle" class="form-label"> <b>Résidence
                                                actuelle : </b> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-street-view"></i></span>
                                            <input type="text" class="form-control" name="residence_actuelle"
                                                value="{{ $consultation->patient->currentResidence->name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="profession" class="form-label"> <b>Profession: </b> </label>
                                        <input type="text" class="form-control" name="profession"
                                            value="{{ $consultation->patient->profession }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="situation_matrimoniale" class="form-label"> <b> Situation
                                                Matrimoniale: </b> </label>
                                        <input type="text" class="form-control" name="situation_matrimoniale"
                                            id="situation_matrimoniale"
                                            value="{{ $consultation->patient->situation_matrimoniale }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="age_mere" class="form-label"> <b>Age: </b> </label>
                                        <input type="text" class="form-control" name="age_mere"
                                            value="{{ \Carbon\Carbon::createFromFormat('d/m/Y', $consultation->patient->birth_date)->diffInYears(Carbon\Carbon::now()) }} ans"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date_accouchement" class="form-label"> <b>Accouchement le : </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date_accouchement" id="text"
                                                value="{{ dateFr($consultation->registre->created_at) }} à {{ heureFr($consultation->registre->created_at) }}"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="num_accouchement" class="form-label"> <b>N° Accouchement : </b>
                                        </label>
                                        <input type="text"
                                            value="{{ $consultation->registre->registreAccouchement->num_accouchement }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="accouch_dom" class="form-label"> <b>Accouchement à domicile : </b>
                                        </label>
                                        <input type="text"
                                            value="{{ $consultation->registre->registreAccouchement->accouch_dom }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="telephone" class="form-label"> <b>Contact : </b> </label>
                                    <div class="d-flex">

                                        <span class="form-control w-80 text-center align-center"
                                            style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                        <input type="text"
                                            style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                            min="10" max="10" name="telephone" class="form-control"
                                            value="{{ $consultation->patient->telephone }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Arrivée</div>
                    <section>
                        <br /><br /><br />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_consultation" class="form-label"> <b>Date : </b>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_consultation" class="form-control"
                                            value="{{ dateFr($consultation->created_at) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>En travail: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->en_travail }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>En travail: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->en_travail }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Contractions: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->contractions }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Poche des eaux intacte: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->poche_intacte }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Temps écoulées (Nbre d'heure):
                                        </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->nbre_heure_ecoule }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Aspect du liquide amniotique:
                                        </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->aspect_amnio }}"
                                        disabled>
                                </div>
                            </div>
                        </div>


                        <div class="box-body ribbon-box">
                            <div class="ribbon ribbon-info">Antécédents</div><br /><br /><br />
                            <div class="mb-0">
                                <section>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Antécédents (Médic
                                                        HTA): </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->hta }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Antécédents
                                                        (Diabète): </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->diabete }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Autre: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->autre_antecedent }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Gestité: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->gestite }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Gestité (Parité):
                                                    </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->parite }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Gestité
                                                        (Gémellité): </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->gemellite }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Gestité
                                                        (Prématuré): </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->premature }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Enfants vivants:
                                                    </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->enfant_vivant }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Enfants décédés:
                                                    </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->enfant_decede }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Césariennes: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->cesarienne }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Avortements: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->avortement }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Tox. gravid.: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->toxemie }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Statut VIH à
                                                        l'accueil: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->status_vih }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Sous TARV : </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->tarv }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>PMI (Age CPN):
                                                    </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->age_1e_cpn }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>PMI (Nombre CPN):
                                                    </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->nombre_cpn }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="numero_gestante" class="form-label"> <b>Statut vaccinal
                                                        VAT: </b>
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $consultation->registre->registreAccouchement->status_vaccination_vat }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info"> Enfant</div>
                    <section>
                        <br /><br /><br />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Sexe: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->sexe_enfant }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Taille (cm): </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->taille_enfant }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Poids (g): </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->poids_enfant }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Périmètre Crânien(cm): </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->perimetre_cranien }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Etat du nouveau-né à la
                                            naissance: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->etat_nouveau_ne }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Allaitement (Date et heure
                                            mise
                                            au sein): </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->perimetre_cranien }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Conseils pour l'allaitement
                                            exclusif: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->conseil_allaitement }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Soins Mère(SMK): </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->skm }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Traitement: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->preciser_traitement }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label">
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->sat }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label">
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->prophylaxie }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Evacué pour: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->raison_evacuation }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Lieu: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->lieu_evacuation }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Date d'évacuation: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->date_evacuation }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Décédée à la maternité: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->deces_oui }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Le: </b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreAccouchement->date_deces_maternite }}"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Offre de Service</div>
                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Proposition de test VIH:
                                            </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->proposition_test_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>N° Dépistage: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->numero_depistage }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Resultat de test VIH: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->resultat_test_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Annonce du résultat: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->annonce_resultat_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Initiation ARV: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->init_arv }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Méthode adoptée: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->methode_adoptee }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PPI ( &le; à
                                                48h après accouchement
                                                ): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreAccouchement->conseil_pf }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>


                        </section>
                    </div>
                </div>
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Informations Cliniques et Examen Obstétrical</div><br />
                    <div class="mb-0">
                        <section>
                            <br /><br />
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ddr" class="form-label"> <b>DDR : </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="ddr" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->ddr }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="terme_prevu" class="form-label"> <b>TP : </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="terme_prevu" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->terme_prevu }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="poids" class="form-label"> <b>Poids (kg): </b> </label>
                                        <input type="text" class="form-control" id="poids" name="poids"
                                            value="{{ $consultation->patient->poids }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="po" class="form-label"> <b>PO : </b> </label>
                                        <input type="text" class="form-control" id="po" name="PO"
                                            value="{{ $consultation->registre->registreAccouchement->PO }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="taille" class="form-label"> <b>Taille (en cm) : </b> </label>
                                        <input type="text" class="form-control" id="taille" name="taille"
                                            value="{{ $consultation->patient->taille }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="presentation" class="form-label"> <b>Présentation </b> </label>
                                        <input type="text" class="form-control" id="presentation"
                                            value="{{ $consultation->registre->registreAccouchement->presentation }}"
                                            disabled>


                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rcf" class="form-label"> <b>R.C.F : </b> </label>
                                        <input type="text" class="form-control" id="rcf" name="RCF"
                                            value="{{ $consultation->registre->registreAccouchement->RCF }}" disabled>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Excision" class="form-label"> <b>Excision : </b> </label>
                                        <input type="text" class="form-control" id="Excision" name="Excision"
                                            value="{{ $consultation->registre->registreAccouchement->Excision }}"
                                            disabled>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Oedemes" class="form-label"> <b>Oedemes : </b> </label>
                                        <input type="text" class="form-control" id="Oedemes" name="Oedemes"
                                            value="{{ $consultation->registre->registreAccouchement->Oedemes }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="varices" class="form-label"> <b>Varices : </b> </label>
                                        <input type="text" class="form-control" id="varices" name="Varices"
                                            value="{{ $consultation->registre->registreAccouchement->Varices }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="TA" class="form-label"> <b>T.A : </b> </label>
                                        <input type="text" class="form-control" id="TA" name="TA"
                                            value="{{ $consultation->registre->registreAccouchement->TA }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pouls" class="form-label"> <b>Pouls : </b> </label>
                                        <input type="text" class="form-control" id="pouls" name="Pouls"
                                            value="{{ $consultation->registre->registreAccouchement->Excision }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="bassin" class="form-label"> <b>Bassin : </b> </label>
                                        <input type="text" class="form-control" id="bassin" name="Bassin"
                                            value="{{ $consultation->registre->registreAccouchement->Bassin }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="temperature" class="form-label"> <b>Température : </b> </label>
                                        <input type="text" class="form-control" id="temperature"
                                            value="{{ $consultation->registre->registreAccouchement->temperature }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Conjonctives : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->Excconjonctivession }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Interventions : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->doctor->typeAgent->libelle }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tv" class="form-label"> <b>T.V : </b> </label>
                                        <input type="text" class="form-control" id="tv" name="TV"
                                            value="{{ $consultation->registre->registreAccouchement->TV }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="actes" class="form-label"> <b>Actes : </b> </label>
                                        <input type="text" class="form-control" id="actes" name="Actes"
                                            value="{{ $consultation->registre->registreAccouchement->Actes }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Réanimation du Nouveau-né</div>
                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>A-t-il respiré/pleuré dans la
                                                1ere minute de : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->reaction_bebe }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Motif si non : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->action_si }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Si réanimer : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->reanimation }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Mode d'accouchement : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->mode_accouchement }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Mode d'expulsion : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->mode_expulsion }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Mode de Délivrance : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->mode_delivrance }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Délivré à : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->heure_delivrance }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Placenta" class="form-label"> <b>Placenta : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="placenta" id="placenta"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->placenta }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="examen" class="form-label"> <b>Examen : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="examen" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->heure_delivrance }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="membrane" class="form-label"> <b>Membranes : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="membrane" id="membrane"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->membrane }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cordon" class="form-label"> <b>Cordon : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="cordon" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->cordon }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="particularite" class="form-label"> <b>Particularité : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="particularite" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->particularite }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Nbre_vo" class="form-label"> <b>Nbre V.O : </b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="Nbre_vo" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->Nbre_vo }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="particularite" class="form-label"> <b>Révision utérine : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="particularite" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->revision_uterine }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ta_apres_accouchement" class="form-label"> <b>TA <small>(après
                                                    accouchement)</small> :</b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="ta_apres_accouchement"
                                                name="ta_apres_accouchement" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->ta_apres_accouchement }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pouls_apres_accouchement" class="form-label"> <b>Pouls
                                                <small>(après
                                                    accouchement)</small> :</b> </label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="pouls_apres_accouchement"
                                                name="pouls_apres_accouchement" class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->ta_apres_accouchement }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conscience" class="form-label"> <b>Conscience :</b></label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="conscience" name="conscience"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->conscience }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="globule_uterin" class="form-label"> <b>Globe utérin :</b></label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="globule_uterin" name="globule_uterin"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->globule_uterin }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="saignement_vulvaire" class="form-label"> <b>Saignements vulvaires
                                                :</b></label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="saignement_vulvaire" name="saignement_vulvaire"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->saignement_vulvaire }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="saignement_vulvaire" class="form-label"> <b>Complications
                                                obstétricales
                                                :</b></label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="saignement_vulvaire" name="saignement_vulvaire"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->complication_obstetricales }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="type_complication" class="form-label"> <b>Type de Complications
                                                :</b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="type_complication" name="type_complication"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->type_complication }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="type_complication" class="form-label"> <b>Prise en charge des HPPI
                                                :</b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="type_complication" name="prise_en_charge_hppi"
                                                class="form-control"
                                                value="{{ $consultation->registre->registreAccouchement->prise_en_charge_hppi }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Ordonnance</label>
                                        <textarea rows="4" class="form-control" name="ordonnane_mere" placeholder="Sortie de la mère" disabled>
                                            {{ $consultation->registre->registreAccouchement->ordonnane_mere }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Ordonnance</label>
                                        <textarea rows="4" class="form-control" name="ordonnance_enfant" placeholder="Sortie de l'enfant" disabled>
                                            {{ $consultation->registre->registreAccouchement->ordonnance_enfant }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-info">Sortie de la mère</div>

                    <div class="mb-0">
                        <section>
                            <br /><br /><br />

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Date de Sortie : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->date_sortie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Mode de sortie : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->issue_consultation_justification }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Cause du décès : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->cause_deces }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Evacuée : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->evacuation_mere }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="conjonctives" class="form-label"> <b>Motif d'évacuation : </b>
                                        </label>
                                        <input type="text" class="form-control" id="conjonctives"
                                            value="{{ $consultation->registre->registreAccouchement->Motif_evacuation_mere }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="example-time-input" class="form-label"><b>Heure décision
                                                :</b></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="time" name="heure_decision"
                                            value="{{ $consultation->registre->registreAccouchement->heure_decision }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="heure_depart" class="form-label"><b>Heure dép. eff.
                                                :</b></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="time" value=""
                                            value="{{ $consultation->registre->registreAccouchement->heure_depart }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Nom Etablissement :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->nom_etablissement }}" disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Responsable de l'accouchement :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->doctor->user->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Ambulance :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->Ambulance }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Precision si non :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->preciser_evacuation }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Supplémen. VIT A/(1ere dose) :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->vit_A_1ere_dose }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Date(2e dose) :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->vit_A_2e_dose }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Date RDV consult. postnatale :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->date_prochain_rdv }}" disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Fiche de déclaration de naissance renseignée ? :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->fiche_renseignee }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom_etablissement" class="form-label"> <b>Fiche renseignée avec les "infos nécessaires" ? :
                                            </b>
                                        </label>
                                        <input type="text" class="form-control" name="nom_etablissement"
                                            value="{{ $consultation->registre->registreAccouchement->fiche_rens_complet }}" disabled>
                                    </div>
                                </div>

                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
</section>
