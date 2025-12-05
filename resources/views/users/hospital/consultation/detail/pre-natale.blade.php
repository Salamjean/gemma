<section class="content">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Données sur la Patiente</div>

                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom Patient : </b> <span
                                                class="danger">*</span> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $consultation->patient->user->name }}" disabled>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="prenom" class="form-label"> <b>Prénom(s) Patient : </b> <span
                                                class="danger">*</span> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="prenom" class="form-control"
                                                value="{{ $consultation->patient->user->prenom }}" disabled>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="email" class="form-label"> <b>E-mail Patient : </b> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $consultation->patient->user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender" class="form-label"> <b>Sexe : </b> <span
                                                class="danger">*</span>
                                        </label>
                                        <input type="gender" name="gender" class="form-control"
                                            value="{{ $consultation->patient->gender }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="birth_date" class="form-label"> <b>Date de naissance : </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="birth_date" name="birth_date" class="form-control"
                                                value="{{ $consultation->patient->birth_date }} ({{ Carbon\Carbon::parse($consultation->patient->birth_date)->diffInYears(Carbon\Carbon::now()) }} ans)"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">

                                <div class="col-md-2">
                                    <label for="telephone" class="form-label"> <b>Contact 1 : </b> </label>
                                    <div class="d-flex">

                                        <span class="form-control w-80 text-center align-center"
                                            style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                        <input type="text"
                                            style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                            min="10" max="10" name="telephone" class="form-control"
                                            value="{{ $consultation->patient->contact2 }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="contact2" class="form-label"> <b>Contact 2 : </b> </label>
                                        <div class="d-flex">

                                            <span class="form-control w-80 text-center align-center"
                                                style="border-top-right-radius: 0; border-bottom-right-radius: 0;">+225</span>
                                            <input type="text"
                                                style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: none;"
                                                min="10" max="10" name="contact2" class="form-control"
                                                value="{{ $consultation->patient->telephone }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="residence_actuelle" class="form-label"> <b>Lieu de résidence
                                                actuelle : </b> <span class="danger">*</span> </label>

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
                                        <label for="date_consultation" class="form-label"> <b>Date de consultation
                                                : </b>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>

                                            <input type="text" class="form-control"
                                                value="{{ dateFr($consultation->created_at) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Renseignements Administratifs de la Patiente</div>
                    <section>
                        <br /><br /><br /> <br />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Mode d'entrée :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->mode_entree }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Report numéro gestante
                                            précédent :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->num_gest_prec }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Numéro Gestante de la visite
                                            :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->num_gest_visite }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Situation Matrimoniale :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->situation_matrimoniale }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Pays de naissance :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->patient->country }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Profession :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->profession }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Nb d'enfant :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->patient->nbre_enfant }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Type de pièce d'identité :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->patient->type_piece }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>N° Pièce d'identité :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->patient->numero_identite }}" disabled>
                                </div>
                            </div>


                        </div>
                        <br />

                    </section>
                </div>
            </div>
        </div>

        <div class=" col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark"> Renseignements Médicales de la Patiente</div>
                    <section>
                        <br /><br /><br />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Taille (en cm) :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->taille }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Poids (kg) :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->poids }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Température :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->temperature }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Périmètre Brachial :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->perimetre_brachial }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>TA :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->ta }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Pouls :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->pouls }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Périmètre Brachial :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->perimetre_brachial }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Médicaux HTA :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->hta }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Diabète :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->diabete }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Chirurgicaux :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->chirurgicaux }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Obstétricaux :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->obstetricaux }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Gestité :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->gestite }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Parité :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->parite }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Enfants vivants :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->enft_vivants }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Enfants décédés :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->enft_decedes }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Césarienne :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->cesarienne }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Avortement :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->avortement }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Toxémie gravidique :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->toxemie_grav }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>DDR :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->ddr }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Terme Prévu :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->terme_prevu }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Date dernière CPN :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->derniere_cpn }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Semaines d'aménor. :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->semaine_amenor }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Type de visite :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->type_visite }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Statut VAT :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->date_vat1 }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Statut VAT 2 :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->date_vat2 }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Statut VAT Rappel :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->date_vatR }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Statut VAT :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->status_vat }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Statut VIH à l'accueil :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->status_vih }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Préciser N° PEC :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->num_pec }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Proposition de test VIH :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->prop_test }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>Retesting :</b> </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->retesting }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numero_gestante" class="form-label"> <b>N° de Dépistage VIH :</b>
                                    </label>
                                    <input type="text" class="form-control"
                                        value="{{ $consultation->registre->registreConsultationPreNatale->num_depistage }}"
                                        disabled>
                                </div>
                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>

        <div class=" col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Examen général</div>
                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conjonctives :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->conjonctives }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Seins :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->seins }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Vergetures :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->vergetures }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Varices :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->varices }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Oedèmes :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->oedemes }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Autres :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->autres }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Examen Obstétrical</div>
                    <div class="mb-0">
                        <section>
                            <br /><br /><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>PO :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->po }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>HU :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->hu }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Age Gestationnel :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->age_gest }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>BDC :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->bdc }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Présentation :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->presentation }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>TV :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->tv }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Pathologies associées
                                                :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->pathologie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Anémie Clinique :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->Anémie }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Etat nutritionnel :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->etat_nutri }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil PF :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->conseil_pf }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Méthode souhaitée :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->methode }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Résultat de la
                                                consultation :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->resultat_consultation }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b> Précisions SI grossesse à
                                                risque :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->issue_consultation_justification }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>

            </div>
        </div>
        <div class=" col-12">
            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Examens Biologiques</div>
                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Taux Hémoglo.(%) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->taux_hemoglo }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Electroph. hémoglo. :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->electrophèse }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Albumine :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->albumine }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sucre :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->sucre }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Recherche de nitrite dans
                                                les urines/ECBU :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->ecbu }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Glycémie (Examen demandé)
                                                :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->glyc_exa }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Glycémie (Résultat reçu)
                                                :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->glyc_recu }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>à jeûn (g/l): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->resul_ajeun }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>non à jeûn (g/l): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->resul_najeun }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Glycémie NA: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->glyc_resul_na }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de Syphilis (Examen demandé) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->syph_exa }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de Syphilis (Résultat reçu) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->syph_recu }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de Syphilis (Résultat) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->resul_syph }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sérologie Toxoplasmose (IgG) : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->st_igG }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sérologie Toxoplasmose (IgM) : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->st_igM }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sérologie Rubéole (IgG) : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->sr_igG }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Sérologie Rubéole (IgM) : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->sr_igM }}"
                                            disabled>
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de AgHBs (Examen demandé) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->agHBs_exa }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de AgHBs (Résultat reçu) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->agHBs_recu }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Test de AgHBs (Résultat) :</b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->agHBs_resul }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Résultat Test de Dépistage VIH : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->resultat_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Annonce du Résultat VIH : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->annonce_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Dépistage du Conjoint : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->conjoint_vih }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Statut Sérologique VIH du Conjoint : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->status_vih_conjoint }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Prélèvement pour la charge virale : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->Prel_charge }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Charge virale &le; à 1000
                                                copies/ml (dernier trimestre de la grossesse): </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->cv_inf1000 }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Autres Examens
                                                Biologiques : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->autre_examen_bio }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Examens
                                                Echographiques ou Radiologiques : </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->examen_echo_radio }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Conseil nutritionnel: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->conseil_nutritionnel }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Service nutritionnel: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->service_nutritionnel }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Préciser: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->preciser_service }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Autres médicaments: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->autre_medic }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="numero_gestante" class="form-label"> <b>Date du prochain RDV: </b>
                                        </label>
                                        <input type="text" class="form-control"
                                            value="{{ $consultation->registre->registreConsultationPreNatale->date_prochain_rdv }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
