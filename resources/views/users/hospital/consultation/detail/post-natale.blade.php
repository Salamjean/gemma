<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Données sur la Patiente</div>

                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom Patient : </b> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $consultation->patient->user->name }} " disabled>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="prenom" class="form-label"> <b>Prénom(s) Patient : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="prenom" class="form-control"
                                                value="{{ $consultation->patient->user->prenom }}" disabled>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender" class="form-label"> <b>Sexe : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email" value="{{ $consultation->patient->gender }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="birth_date" class="form-label"> <b>Date de naissance : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $consultation->patient->birth_date }} ({{ Carbon\Carbon::parse($consultation->patient->birth_date)->diffInYears(Carbon\Carbon::now()) }} ans)"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="residence_actuelle" class="form-label"> <b>Lieu de résidence
                                                actuelle : </b> </label>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-street-view"></i></span>
                                            <input type="text" class="form-control" name="residence_actuelle"
                                                value="{{ $consultation->patient->currentResidence->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="date_consultation" class="form-label"> <b>Date de consultation :
                                            </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date_consultation" id="date_consultation"
                                                class="form-control" value="{{ dateFr($consultation->created_at) }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />

                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="col-12">
                <div class="box">
                    <div class="box-body ribbon-box">
                        <div class="ribbon ribbon-dark">Renseignements Administratifs de la Patiente</div>
                        <section>
                            <br /><br /><br /> <br />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Mode d'entré</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->mode_entree }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Numéro Gestante de la
                                                visite</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->numero_gestante }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Profession</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->patient->profession }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Situation
                                                Matrimoniale</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->patient->situation_matrimoniale }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Pays de naissance</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->patient->country }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Nombre d'enfant</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->patient->nbre_enfant }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>En cours de
                                                scolarisation</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->eleve }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Type population</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->type_population }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Type de consultation
                                                postnatale :</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->type_consultation_postnatale }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="ribbon ribbon-dark">Examen de la patiente</div>
                                <div class="ribbon ribbon-dark" style="margin-left: 10px; background-color:red;">
                                    Examen
                                    général</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Poids (kg):</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->poids }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Temperature :</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->temperature }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>TA :</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->ta }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Pouls:</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->pouls }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>PB:</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->pb }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Oedèmes:</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->oedemes }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Varics: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->varics }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Etat des
                                                conjonctives:</b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->etat_conjonctives }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conscience: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conscience }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Seins: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->seins }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Abdomen: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->abdomen }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Globe uterin: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->globe_uterin }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="ribbon ribbon-dark"
                                    style="margin-left: 10px; margin-top: 10px; background-color:red;">Examen
                                    gynécologique</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Examen du périnée:: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->examen_perine }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Vulve: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->vulve }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Uterus: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->uterus }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Vessie: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->vessie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Lochies: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->lochies }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Examen au
                                                spéculum: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->examen_speculum }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test à l'acide acétique:
                                            </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->test_acide_acetique }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>T.V: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->tv }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Enfant vivant : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->enfant_vivant }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Enfant à jour de ses
                                                vaccins: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->enfant_jour_vaccin }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Femme allaitante: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->femme_allaitante }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Allaitement exlusif: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->allaitement_exlusif }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Autres type
                                                d'allaitement: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->autre_type_allaitement }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil en alimentation de
                                                la mère: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conseil_alimentation_mere }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil en alimentation de
                                                l'enfant: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conseil_alimentation_enfant }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Etat nutritionnel: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->etat_nutritionnel }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil en alimentation de
                                                l'enfant: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->retour_couche }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Patologies
                                                associées: </b> </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->patologies_associees }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="ribbon ribbon-dark"> Antécédents</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Médicaux HTA: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->antecedent_hta }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Diabète: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->antecedent_diabete }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Chirurgicaux: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->chirurgicaux }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Obstétricaux: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->obstetricaux }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Gestité: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->gestite }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Parité: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->parite }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Enfants vivants: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->nb_enfant_vivant }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Enfants décédés: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->enfant_decede }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Césarienne: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->cesarienne }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Avortement: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->Avortement }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Toxémie gravidique: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->toxemie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Date de
                                                l'accouchement: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->date_accouchement }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Lieu d'accouchement: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->antecedent_lieu_accouch }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Mode d'accouchement: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->antecedent_mode_accouch }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Statut VAT: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->date_vat1 }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Statut VAT2: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->date_vat2 }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Date rappel VAT: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->date_vat_rappel }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Etat vaccination: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->etat_vaccination }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Statut VIH à l'accueil: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->status_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PP1 (<= 48 heures à 6 semaines après
                                                            l'accouchement) </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conseil_pf_pp1 }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PP tardif (de 48 heures à 6
                                                            semaines
                                                            après
                                                            l'accouchement): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conseil_pf_ppt }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PP prolongé (de 6 semaines à
                                                            un an
                                                            après
                                                            l'accouchement): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->conseil_pf_ppp }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Méthode adoptée: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->methode_adoptee }}"
                                            disabled>
                                    </div>
                                </div>
                            <div class="ribbon ribbon-dark"> Conduite à tenir</div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Proposition de test VIH: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->proposition_test_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Retesting: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->retesting }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Numéro de
                                                dépistage
                                                VIH:: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->numero_depistage_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Resultat du test de depistage VIH: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->resultat_test_depistage_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Annonce du résultat: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->annonce_resultat }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Prophylaxie ARV pour l'enfant: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->prophylaxie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="ribbon ribbon-dark" style="margin-left: 10px; background-color:red;">
                                    Examens
                                    biologiques</div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Albumine: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->analyse_urine_albumine }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sucre: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->analyse_urine_sucre }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Glycémie: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->glycemie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>à jeûn (g/l): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->glycemie_jeun }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>non à jeûn (g/l): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->glycemie_no_jeun }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PP1: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_pf_conseil_pf_ppp1 }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF-PP: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_pf_conseil_pf_ppp }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Acceptation de méthodes contraceptives: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->acceptation_methodes_contraceptives }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Si oui type: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_pf_conseil_pf_ppp }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>acceptation_methodes_contraceptives_precision: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_pf_conseil_pf_ppp }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Méthode adoptée: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->acceptation_methodes_contraceptives_methode }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Prescriptions: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->prescription }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Offre de service nutritionnel: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_nutritionnel }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Si oui, Précisez: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_nutritionnel_oui_precision }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Autre médicaments: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->offre_service_nutritionnel_oui_precision }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"> <b>Observation :</b> </label>
                                        <div class="input-group">
                                            <textarea name="observation" class="form-control" id="observation" cols="10" rows="5" disabled>
                                                {{ $consultation->registre->registreConsultationPostNatale->observation }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Complication: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->resultat_consultation }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Si oui, préciser: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->resultat_consultation_oui_precision }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Mode de sortie: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->mode_sortie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Date du prochain
                                                rendez-vous: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPostNatale->date_prochain_rdv }}"
                                            disabled>
                                    </div>
                                </div>

                            </div> <br>

                        </section>
                    </div>
                </div>
            </div>

        </div>



</section>
