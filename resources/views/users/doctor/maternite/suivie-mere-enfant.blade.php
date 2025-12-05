@extends('layouts.dashboard', ['title' => 'Suivie mère enfant'])
@section('content')
    <!--- Bouton Prenatale et postnatale   -->
    <div class="container box">
        <div class="mt-20">
            <div class="row">
                <div class="col-12" style="text-align: center">
                    <div class="clearfix">
                        <button id="butPrenatale" type="button" class="waves-effect waves-light btn mb-5 bg-gradient-info me-80 pe-50 ps-50">Suivie prénatale</button>
                        <button id="butPostnatale" type="button" class="waves-effect waves-light btn mb-5 bg-gradient-warning pe-50 ps-50">Suivie postnatale</button>
                    </div>
                </div>
            </div>
            <img id="imgBG" src="{{ asset('assets/images/bg-mere-enfant.png') }}" alt="img-mere-enfant" style="height: 624px"/>
        </div>
    </div>
    <!-- Formulaire recherche Prenatale & postnatale -->
    <div class="container" id="searchForm">
        <div class="row mt-20">
            <div class="col-md-6">
                <div class="box" id="searchPrenatale">
                    <div class="box-header bg-primary-light text-dark bb-3 border-danger">
                        <label class="form-label fs-16 fw-500 mt-10">Entrez le N° de <span class="fw-bold">Dossier médical (DM)</span> de la mère svp ! || Prénatale</label>
                    </div>
                    <div class="box-body">
                        <div style="text-align: center">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control h-50" id="code_prenatal" name="code_patient"
                                        placeholder="Ex: DM0502991225">
                                    <button type="button" onclick="ResearchPrenatale()" class="input-group-text"><i
                                            class="fa-solid fa-rotate"></i></button>
                                </div>
                                <span class="text-danger" id="erreur"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box" id="searchPostnatale">
                    <div class="box-header bg-warning-light bb-3 border-info text-dark">
                        <label class="form-label fs-16 fw-500 mt-10">Entrez le N° de <span class="fw-bold">Dossier médical (DM)</span> de l'enfant svp ! || Postnatale</label>
                    </div>
                    <div class="box-body">
                        <div style="text-align: center">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control h-50" id="code_postnatale" name="code_patient"
                                        placeholder="Ex: DM0502991225">
                                    <button type="button" onclick="ResearchPostnatale()" class="input-group-text"><i
                                            class="fa-solid fa-rotate"></i></button>
                                </div>
                                <span class="text-danger" id="erreur"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Formulaire de validation postnatale & prenatale -->
    <div class="container">
        <form id="formPrenatale">
            @csrf
            <input type="hidden" name="patient_id" id="patient_id"/>
            <div class="bt-3">
                <div class="box bb-3 border-warning pe-95 pb-20 ps-95 pt-20 bg-color">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Mois</label>
                            <input style="text-transform: uppercase" type="text" class="form-control" value="{{ getMois() }}" readonly/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Année</label>
                            <input type="text" class="form-control" value="{{ getAnnee() }}" readonly/>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-6">
                            <label class="form-label fs-16 fw-500 mt-10">N° Dossier médical : <span class="fw-bold fs-18"><span id="dm_patient"></span></span></label>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-6">
                            <label class="form-label fs-16 fw-500 mt-10">Nom & prénom(s) mère</label>
                            <input type="text" class="form-control" id="name" readonly/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fs-16 fw-500 mt-10">Date de naissance</label>
                            <input type="text" class="form-control" id="birth_date" readonly/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fs-16 fw-500 mt-10">Age : </label><br/>
                            <input type="text" class="form-control" id="age" readonly/>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="float-end mb-10" id="addPrenatale">
                    <button type="button" class="btn btn-primary" >Ajouter autre suivie</button>
                </div>
                <div id="suivie"></div>
                <br/>
                <div class="box bt-3 border-info" id="PrenataleForm">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Date de la visite</label>
                                <input type="date" class="form-control @error('date_visite') is-invalid @enderror" name="date_visite" id="date_visite" />
                                
                                @error('date_visite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label fs-16 fw-500 mt-10">Age gestationnel <br/> <span class="text-muted fs-10">( en semaines d'aménorrhée )</span></label>
                                        <input type="text" class="form-control @error('age_gestationnel') is-invalid @enderror" name="age_gestationnel" placeholder="___ semaines" id="age_gestationnel"/>&nbsp;
                                        
                                        @error('age_gestationnel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input id="radio-70" type="radio" name="age_gestationnel" />
                                        <label for="radio-70" class="me-30 mt-65">NA</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500">Statut ARV à l'enregistrement</label>
                                <div class="c-inputs-stacked @error('statut_arv') is-invalid @enderror" id="statut_arv">
                                    <input type="radio" name="statut_arv" id="radio-40" value="Positif sans ARV"> 
                                    <label class="me-30" for="radio-40">Positif sans ARV</label>
                                    <input type="radio" name="statut_arv" id="radio-41" value="Positif déjà sous ARV"> 
                                    <label class="me-30" for="radio-41">Positif déjà sous ARV</label>
                                    <input type="radio" name="statut_arv" id="radio-42" value="Nouvellement diagnostiquée VIH Positif au cours du mois"> 
                                    <label class="me-30" for="radio-42">Nouvellement diagnostiquée VIH Positif au cours du mois</label>
                                </div>
                                @error('statut_arv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fs-16 fw-500">Date d'initiation du traitement ARV</label><br/>
                                <input type="date" class="form-control @error('date_initiation_arv') is-invalid @enderror" name="date_initiation_arv" id="date_initiation_arv" />
                                @error('date_initiation_arv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Mère toujours sous ARV ?</label>
                                <div class="c-inputs-stacked @error('mere_sous_arv') is-invalid @enderror" id="mere_sous_arv">
                                    <input type="radio" name="mere_sous_arv" id="radio-43" value="Oui"> 
                                    <label class="me-30" for="radio-43">Oui</label>
                                    <input type="radio" name="mere_sous_arv" id="radio-44" value="Non"> 
                                    <label class="me-30" for="radio-44">Non</label>
                                </div>
                                @error('mere_sous_arv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Cotrimoxazole</label>
                                <div class="c-inputs-stacked @error('cotrimoxazole') is-invalid @enderror" id="cotrimoxazole">
                                    <input type="radio" name="cotrimoxazole" id="radio-45" value="Oui"> 
                                    <label class="me-30" for="radio-45">Oui</label>
                                    <input type="radio" name="cotrimoxazole" id="radio-46" value="Non"> 
                                    <label class="me-30" for="radio-46">Non</label>
                                </div>
                                @error('cotrimoxazole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Prélèvement pour charge virale</label>
                                <div class="c-inputs-stacked @error('prelevement_charge_virale') is-invalid @enderror" id="prelevement_charge_virale">
                                    <input type="radio" name="prelevement_charge_virale" id="radio-47" value="Oui"> 
                                    <label class="me-30" for="radio-47">Oui</label>
                                    <input type="radio" name="prelevement_charge_virale" id="radio-48" value="Non"> 
                                    <label class="me-30" for="radio-48">Non</label>
                                </div>
                                @error('prelevement_charge_virale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="formViral" class="mt-20">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-label fs-16 fw-500">Date de prélèvement</label><br/>
                                    <input type="date" class="form-control @error('date_de_prelevement_virale') is-invalid @enderror" name="date_de_prelevement_virale" id="date_de_prelevement_virale"/>
                                    @error('date_de_prelevement_virale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label fs-16 fw-500">Date de reception du résultat</label><br/>
                                    <input type="date" class="form-control @error('date_de_reception_resultat') is-invalid @enderror" name="date_de_reception_resultat" id="date_de_reception_resultat" />
                                    @error('date_de_reception_resultat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label fs-16 fw-500">Résultat / Valeur</label><br/>
                                    <input type="text" class="form-control @error('resultat_charge_virale') is-invalid @enderror" name="resultat_charge_virale" id="resultat_charge_virale" placeholder="___ Copie/ml"/>
                                    @error('resultat_charge_virale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row mt-20">
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Dépistage VIH du conjoint</label>
                                <div class="c-inputs-stacked @error('depistage_vih_conjoint') is-invalid @enderror" id="depistage_vih_conjoint">
                                    <input type="radio" name="depistage_vih_conjoint" id="radio-61" value="Oui"> 
                                    <label class="me-30" for="radio-61">Oui</label>
                                    <input type="radio" name="depistage_vih_conjoint" id="radio-62" value="Non"> 
                                    <label class="me-30" for="radio-62">Non</label>
                                    <input type="radio" name="depistage_vih_conjoint" id="radio-60" value="NA"> 
                                    <label class="me-30" for="radio-60">NA</label>
                                </div>
                                @error('depistage_vih_conjoint')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div id="formVIHC" class="mt-20">
                                    <div class="row">
                                        <div class="col-md-7 form-group">
                                            <label class="form-label fs-16 fw-500">Résultat</label><br/>
                                            <div class="c-inputs-stacked @error('resultat_vih_conjoint') is-invalid @enderror" id="resultat_vih_conjoint">
                                                <input type="radio" name="resultat_vih_conjoint" id="radio-52" value="Positif"> 
                                                <label class="me-30" for="radio-52">Positif</label>
                                                <input type="radio" name="resultat_vih_conjoint" id="radio-53" value="Négatif"> 
                                                <label class="me-30" for="radio-53">Négatif</label>
                                                <input type="radio" name="resultat_vih_conjoint" id="radio-54" value="NA"> 
                                                <label class="me-30" for="radio-54">NA</label>
                                            </div>
                                            @error('resultat_vih_conjoint')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label class="form-label fs-16 fw-500">Date de dépistage</label><br/>
                                            <input type="date" class="form-control @error('date_depistage_vih_conjoint') is-invalid @enderror" name="date_depistage_vih_conjoint" id="date_depistage_vih_conjoint" />
                                            @error('date_depistage_vih_conjoint')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row mt-20">
                            <div class="col-md-5 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Porte d'entrée</label>
                                <div class="c-inputs-stacked @error('porte_entree') is-invalid @enderror" id="porte_entree">
                                    <input type="radio" name="porte_entree" id="radio-80" value="Consultation prénatale"> 
                                    <label class="me-30" for="radio-80">Consultation prénatale</label>
                                    <input type="radio" name="porte_entree" id="radio-90" value="Accouchement"> 
                                    <label class="me-30" for="radio-90">Accouchement</label>
                                    <input type="radio" name="porte_entree" id="radio-100" value="Postnatales"> 
                                    <label class="me-30" for="radio-100">Postnatales</label>
                                </div>
                                @error('porte_entree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Type de VIH</label>
                                <div class="c-inputs-stacked @error('type_vih') is-invalid @enderror" id="type_vih">
                                    <input type="radio" name="type_vih" id="radio-81" value="VIH 1"> 
                                    <label class="me-30" for="radio-81">VIH 1</label>
                                    <input type="radio" name="type_vih" id="radio-82" value="VIH 2"> 
                                    <label class="me-30" for="radio-82">VIH 2</label>
                                    <input type="radio" name="type_vih" id="radio-83" value="VIH 3"> 
                                    <label class="me-30" for="radio-83">VIH 3</label>
                                </div>
                                @error('type_vih')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label fs-16 fw-500 mt-10">Date Probale d'Accouchement</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_probable_accouchement" id="date_probable_accouchement" class="form-control @error('date_probable_accouchement') is-invalid @enderror" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                    </div>
                                    @error('date_probable_accouchement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row mt-20">
                            <div class="col-md-6 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Issue de grossesse</label>
                                <div class="c-inputs-stacked @error('issue_de_la_grossesse') is-invalid @enderror" id="issue_de_la_grossesse">
                                    <input type="radio" name="issue_de_la_grossesse" id="radio-64" value="A terme"> 
                                    <label class="me-30" for="radio-64">A terme</label>
                                    <input type="radio" name="issue_de_la_grossesse" id="radio-66" value="Prématuré"> 
                                    <label class="me-30" for="radio-66">Prématuré</label>
                                    <input type="radio" name="issue_de_la_grossesse" id="radio-65" value="Avortement / Fausse couche"> 
                                    <label class="me-30" for="radio-65">Avortement / Fausse couche</label>
                                </div>
                                @error('issue_de_la_grossesse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Accouchement gemellaire</label>
                                <div class="c-inputs-stacked @error('accouchement_gemellaire') is-invalid @enderror" id="accouchement_gemellaire">
                                    <input type="radio" name="accouchement_gemellaire" id="radio-67" value="Oui"> 
                                    <label class="me-30" for="radio-67">Oui</label>
                                    <input type="radio" name="accouchement_gemellaire" id="radio-68" value="Non"> 
                                    <label class="me-30" for="radio-68">Non</label>
                                </div>
                                @error('accouchement_gemellaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Méthode de contraception moderne</label>
                                <div class="c-inputs-stacked @error('methode_de_contraception_moderne') is-invalid @enderror" id="methode_de_contraception_moderne">
                                    <input type="radio" name="methode_de_contraception_moderne" id="radio-49" value="Oui"> 
                                    <label class="me-30" for="radio-49">Oui</label>
                                    <input type="radio" name="methode_de_contraception_moderne" id="radio-50" value="Non"> 
                                    <label class="me-30" for="radio-50">Non</label>
                                </div>
                                @error('methode_de_contraception_moderne')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="box-footer bt-3 border-primary">
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
                <br/>
                
                
            </div>
        </form>
        <form id="formPostnatale">
            @csrf
            <input type="hidden" name="enfant_id" id="enfant_id"/>
            <div class="float-end mb-10" id="addPostnatale">
                <button type="button" class="btn btn-primary" >Ajouter autre suivie</button>
            </div>
            <div id="suivie-postnatale"></div>
            <br/>
            <div class="box p-50">
                <div class="box bb-3 border-danger">
                    <h4 class="box-title fw-bold pe-50 p-30 pb-10" >INFORMATION RELATIVES A L'ENFANT</h4>
                    <div class="box-body">
                        <div class="row mt-10">
                            <div class="col-md-6">
                                <label class="form-label fs-16 fw-500 mt-10">N° Dossier médical : <span class="fw-bold fs-18"><span id="dm_enfant"></span></span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Nom de l'enfant :</label>
                                <input type="text" class="form-control" name="nom_enfant" id="nom_enfant"/>
                            </div>
                            <div class="col-md-5 form-group">
                                <label class="form-label fs-16 fw-500 mt-10">Prénom (s) de l'enfant :</label>
                                <input type="text" class="form-control" name="prenom_enfant" id="prenom_enfant"/>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="box p-50 bb-3 border-primary" id="postnataleForm">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500">Prophylaxie ARV remise à l'enfant</label>
                            <div class="c-inputs-stacked form-group" id="prophylaxie_arv_enfant">
                                <input type="radio" name="prophylaxie_arv_enfant" id="radio-1" value="Oui"> 
                                <label class="me-30" for="radio-1">Oui</label>
                                <input type="radio" name="prophylaxie_arv_enfant" id="radio-2" value="Non"> 
                                <label class="me-30" for="radio-2">Non</label>
                            </div>
                            <div class="mt-10 form-group" id="remiseDate">
                                <label class="form-label">Date de remise</label><br/>
                                <input type="date" class="form-control" name="date_de_remise" id="date_de_remise" />
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date de la visite</label>
                            <input type="date" id="date_visite_postnatale" class="form-control" name="date_visite_postnatale" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment de la visite</label>
                            <input type="text" class="form-control" id="age_au_moment_de_la_visite" name="age_au_moment_de_la_visite" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fs-16 fw-500 mt-10">Type d'alimentation</label>
                            <div class="c-inputs-stacked form-group" id="type_alimentation">
                                <input type="radio" name="type_alimentation" id="radio-3" value="Allaitement exclusif"> 
                                <label class="me-30" for="radio-3">Allaitement exclusif</label>
                                <input type="radio" name="type_alimentation" id="radio-4" value="Alimentation de remplacement exclusif"> 
                                <label class="me-30" for="radio-4">Alimentation de remplacement exclusif</label>
                                <input type="radio" name="type_alimentation" id="radio-5" value="Alimentation de complément"> 
                                <label class="me-30" for="radio-5">Alimentation de complément</label>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <h4 class="fw-600">1er PCR</h4>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date du prélevement</label>
                            <input type="date" class="form-control" id="date_de_prelevement_1er_pcr" name="date_de_prelevement_1er_pcr"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment du prélevement</label>
                            <input type="text" class="form-control" id="age_au_moment_de_prelevement_1er_pcr" name="age_au_moment_de_prelevement_1er_pcr" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Résultat</label>
                            <div class="c-inputs-stacked form-group" id="resultat_1er_pcr">
                                <input type="radio" name="resultat_1er_pcr" id="radio-6" value="Positif"> 
                                <label class="me-30" for="radio-6">Positif</label>
                                <input type="radio" name="resultat_1er_pcr" id="radio-7" value="Négatif"> 
                                <label class="me-30" for="radio-7">Négatif</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Annonce du resultat aux parents</label>
                            <div class="c-inputs-stacked form-group" id="annonce_resultat_parent_1er_pcr">
                                <input type="radio" name="annonce_resultat_parent_1er_pcr" id="radio-8" value="Oui"> 
                                <label class="me-30" for="radio-8">Oui</label>
                                <input type="radio" name="annonce_resultat_parent_1er_pcr" id="radio-9" value="Non"> 
                                <label class="me-30" for="radio-9">Non</label>
                            </div>
                        </div>   
                        <div class="col-md-3 form-group" id="dateAnnonce">
                            <label class="form-label fs-16 fw-500 mt-10">Date d'annonce</label>
                            <input type="date" class="form-control" id="date_annonce_1er_pcr" name="date_annonce_1er_pcr"/>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="fw-600 mt-10">2e PCR</h4>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date du prélevement</label>
                            <input type="date" class="form-control" id="date_de_prelevement_2e_pcr" name="date_de_prelevement_2e_pcr"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment du prélevement</label>
                            <input type="text" class="form-control" id="age_au_moment_de_prelevement_2e_pcr" name="age_au_moment_de_prelevement_2e_pcr" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Résultat</label>
                            <div class="c-inputs-stacked form-group" id="resultat_2e_pcr">
                                <input type="radio" name="resultat_2e_pcr" id="radio-10" value="Positif"> 
                                <label class="me-30" for="radio-10">Positif</label>
                                <input type="radio" name="resultat_2e_pcr" id="radio-11" value="Négatif"> 
                                <label class="me-30" for="radio-11">Négatif</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Annonce du resultat aux parents</label>
                            <div class="c-inputs-stacked form-group" id="annonce_resultat_parent_2e_pcr">
                                <input type="radio" name="annonce_resultat_parent_2e_pcr" id="radio-12" value="Oui"> 
                                <label class="me-30" for="radio-12">Oui</label>
                                <input type="radio" name="annonce_resultat_parent_2e_pcr" id="radio-13" value="Non"> 
                                <label class="me-30" for="radio-13">Non</label>
                            </div>
                        </div>   
                        <div class="col-md-3 form-group" id="dateAnnonce2e">
                            <label class="form-label fs-16 fw-500 mt-10">Date d'annonce</label>
                            <input type="date" class="form-control" name="date_annonce_2e_pcr" id="date_annonce_2e_pcr"/>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="fw-600 mt-10">3e PCR</h4>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date du prélevement</label>
                            <input type="date" class="form-control" name="date_de_prelevement_3e_pcr" id="date_de_prelevement_3e_pcr"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment du prélevement</label>
                            <input type="text" class="form-control" name="age_au_moment_de_prelevement_3e_pcr" id="age_au_moment_de_prelevement_3e_pcr" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Résultat</label>
                            <div class="c-inputs-stacked form-group" id="resultat_3e_pcr">
                                <input type="radio" name="resultat_3e_pcr" id="radio-14" value="Positif"> 
                                <label class="me-30" for="radio-14">Positif</label>
                                <input type="radio" name="resultat_3e_pcr" id="radio-15" value="Négatif"> 
                                <label class="me-30" for="radio-15">Négatif</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Annonce du resultat aux parents</label>
                            <div class="c-inputs-stacked form-group" id="annonce_resultat_parent_3e_pcr">
                                <input type="radio" name="annonce_resultat_parent_3e_pcr" id="radio-16" value="Oui"> 
                                <label class="me-30" for="radio-16">Oui</label>
                                <input type="radio" name="annonce_resultat_parent_3e_pcr" id="radio-17" value="Non"> 
                                <label class="me-30" for="radio-17">Non</label>
                            </div>
                        </div>   
                        <div class="col-md-3 form-group" id="dateAnnonce3e">
                            <label class="form-label fs-16 fw-500 mt-10">Date d'annonce</label>
                            <input type="date" class="form-control" name="date_annonce_3e_pcr" id="date_annonce_3e_pcr"/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <h4 class="fw-600 mt-10">Cotrimoxazole (CTX)</h4>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Enfant sous CTX</label>
                            <div class="c-inputs-stacked form-group" id="enfant_sous_ctx">
                                <input type="radio" name="enfant_sous_ctx" id="radio-18" value="Oui"> 
                                <label class="me-30" for="radio-18">Oui</label>
                                <input type="radio" name="enfant_sous_ctx" id="radio-19" value="Non"> 
                                <label class="me-30" for="radio-19">Non</label>
                            </div>
                        </div>
                        <div class="col-md-9" id="formCTX">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label fs-16 fw-500 mt-10">Date d'initiation du CTX</label>
                                    <input type="date" class="form-control" name="date_initiation_ctx" id="date_initiation_ctx"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label fs-16 fw-500 mt-10">Age à l'initiation du CTX</label>
                                    <input type="text" class="form-control" name="age_initiation_ctx" id="age_initiation_ctx" placeholder="12 semaines"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="fw-600 mt-10">Prophylaxie à l'isoniazide (INH)</h4>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Enfant sous INH</label>
                            <div class="c-inputs-stacked form-group" id="enfant_sous_inh">
                                <input type="radio" name="enfant_sous_inh" id="radio-20" value="Oui"> 
                                <label class="me-30" for="radio-20">Oui</label>
                                <input type="radio" name="enfant_sous_inh" id="radio-21" value="Non"> 
                                <label class="me-30" for="radio-21">Non</label>
                            </div>
                        </div>
                        <div class="col-md-9" id="formINH">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label fs-16 fw-500 mt-10">Date d'initiation du INH</label>
                                    <input type="date" class="form-control" id="date_initiation_inh" name="date_initiation_inh"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label fs-16 fw-500 mt-10">Age à l'initiation du INH</label>
                                    <input type="text" class="form-control" id="age_initiation_inh" name="age_initiation_inh" placeholder="12 semaines"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <h4 class="fw-600 mt-10">Serologie VIH</h4>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date</label>
                            <input type="date" class="form-control" id="date_de_prelevement_vih" name="date_de_prelevement_vih"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment du test</label>
                            <input type="text" class="form-control" id="age_au_moment_du_test" name="age_au_moment_du_test" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Résultat du test</label>
                            <div class="c-inputs-stacked" id="resultat_du_test">
                                <input type="radio" name="resultat_du_test" id="radio-22" value="Positif"> 
                                <label class="me-30" for="radio-22">Positif</label>
                                <input type="radio" name="resultat_du_test" id="radio-23" value="Négatif"> 
                                <label class="me-30" for="radio-23">Négatif</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Annonce du resultat aux parents</label>
                            <div class="c-inputs-stacked" id="annonce_du_test">
                                <input type="radio" name="annonce_du_test" id="radio-24" value="Oui"> 
                                <label class="me-30" for="radio-24">Oui</label>
                                <input type="radio" name="annonce_du_test" id="radio-25" value="Non"> 
                                <label class="me-30" for="radio-25">Non</label>
                            </div>
                        </div>   
                        <div class="col-md-3 mt-3 mb-3 form-group" id="dateTest">
                            <label class="form-label fs-16 fw-500 mt-10">Date d'annonce</label>
                            <input type="date" class="form-control" name="date_annonce_du_test" id="date_annonce_du_test"/>
                        </div>
                        
                        <hr/>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date</label>
                            <input type="date" class="form-control" name="date_de_prelevement_vih2" id="date_de_prelevement_vih2"/>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Age au moment du test</label>
                            <input type="text" class="form-control" name="age_au_moment_du_test2" id="age_au_moment_du_test2" placeholder="12 semaines"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fs-16 fw-500 mt-10">Résultat du test</label>
                            <div class="c-inputs-stacked form-group" id="resultat_du_test2">
                                <input type="radio" name="resultat_du_test2" id="radio-36" value="Positif"> 
                                <label class="me-30" for="radio-36">Positif</label>
                                <input type="radio" name="resultat_du_test2" id="radio-35" value="Négatif"> 
                                <label class="me-30" for="radio-35">Négatif</label>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Annonce du resultat aux parents</label>
                            <div class="c-inputs-stacked" id="annonce_du_test2">
                                <input type="radio" name="annonce_du_test2" id="radio-37" value="Oui"> 
                                <label class="me-30" for="radio-37">Oui</label>
                                <input type="radio" name="annonce_du_test2" id="radio-38" value="Non"> 
                                <label class="me-30" for="radio-38">Non</label>
                            </div>
                        </div>   
                        <div class="col-md-3 form-group" id="dateTest2">
                            <label class="form-label fs-16 fw-500 mt-10">Date d'annonce</label>
                            <input type="date" class="form-control" name="date_annonce_du_test2" id="date_annonce_du_test2"/>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <h4 class="fw-600 mt-10">Resultat final du suivi</h4>
                        <div class="col-md-7 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Resultat</label>
                            <div class="c-inputs-stacked" id="resultat_final_du_suivi">
                                <input type="radio" name="resultat_final_du_suivi" id="radio-31" value="Négatif sorti du programme"> 
                                <label class="me-30" for="radio-31">Négatif sorti du programme</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-32" value="Perdu de vue"> 
                                <label class="me-30" for="radio-32">Perdu de vue</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-33" value="Décédé"> 
                                <label class="me-30" for="radio-33">Décédé</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-34" value="Positif adressé pour la PEC"> 
                                <label class="me-30" for="radio-34">Positif adressé pour la PEC</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-28" value="Positif non mis sous ARV">
                                <label class="me-30" for="radio-28">Positif non mis sous ARV</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-29" value="Transferé"> 
                                <label class="me-30" for="radio-29">Transferé</label>
                                <input type="radio" name="resultat_final_du_suivi" id="radio-30" value="Réferé"> 
                                <label class="me-30" for="radio-30">Réferé</label>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Site de transfert ou de référence</label>
                            <input type="text" class="form-control" name="site_de_transfert" id="site_de_transfert"/>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="form-label fs-16 fw-500 mt-10">Date du statut final</label>
                            <input type="date" class="form-control" name="date_du_statut_final" id="date_du_statut_final"/>
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
    <style>
        .bg-color { 
            background: #f7f8f8;
        }
        .bg-sme{
            background-color: #F9429E;
        }
    </style>
    
    <script>
        const remiseARV = document.querySelectorAll('input[type=radio][name="prophylaxie_arv_enfant"]');
        const remiseInput = document.getElementById('remiseDate')

        remiseInput.style.display = 'none';

        Array.prototype.forEach.call(remiseARV, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                remiseInput.style.display = 'block';
                remiseInput.required = true;
            } else {
                remiseInput.style.display = 'none';
                remiseInput.required = false;
            }
        }
    </script>
    <script>
        const annonceP = document.querySelectorAll('input[type=radio][name="annonce_resultat_parent_1er_pcr"]');
        const dateInput = document.getElementById('dateAnnonce')

        dateInput.style.display = 'none';

        Array.prototype.forEach.call(annonceP, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                dateInput.style.display = 'block';
                dateInput.required = true;
            } else {
                dateInput.style.display = 'none';
                dateInput.required = false;
            }
        }
    </script>
    <script>
        const annonceP3 = document.querySelectorAll('input[type=radio][name="annonce_resultat_parent_3e_pcr"]');
        const dateInput3 = document.getElementById('dateAnnonce3e')

        dateInput3.style.display = 'none';

        Array.prototype.forEach.call(annonceP3, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                dateInput3.style.display = 'block';
                dateInput3.required = true;
            } else {
                dateInput3.style.display = 'none';
                dateInput3.required = false;
            }
        }
    </script>
    <script>
        const annonceP2 = document.querySelectorAll('input[type=radio][name="annonce_resultat_parent_2e_pcr"]');
        const dateInput2 = document.getElementById('dateAnnonce2e')

        dateInput2.style.display = 'none';

        Array.prototype.forEach.call(annonceP2, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                dateInput2.style.display = 'block';
                dateInput2.required = true;
            } else {
                dateInput2.style.display = 'none';
                dateInput2.required = false;
            }
        }
    </script>
    <script>
        const iniCTX = document.querySelectorAll('input[type=radio][name="enfant_sous_ctx"]');
        const formCTX = document.getElementById('formCTX');

        formCTX.style.display = 'none';

        Array.prototype.forEach.call(iniCTX, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                formCTX.style.display = 'block';
                formCTX.required = true;
            } else {
                formCTX.style.display = 'none';
                formCTX.required = false;
            }
        }
    </script>
    <script>
        const iniINH = document.querySelectorAll('input[type=radio][name="enfant_sous_inh"]');
        const formINH = document.getElementById('formINH');

        formINH.style.display = 'none';

        Array.prototype.forEach.call(iniINH, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                formINH.style.display = 'block';
                formINH.required = true;
            } else {
                formINH.style.display = 'none';
                formINH.required = false;
            }
        }
    </script>
    <script>
        const resultat_du_test = document.querySelectorAll('input[type=radio][name="annonce_du_test"]');
        const dateInputTest = document.getElementById('dateTest')

        dateInputTest.style.display = 'none';

        Array.prototype.forEach.call(resultat_du_test, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                dateInputTest.style.display = 'block';
                dateInputTest.required = true;
            } else {
                dateInputTest.style.display = 'none';
                dateInputTest.required = false;
            }
        }
    </script>
    <script>
        const resultat_du_test2 = document.querySelectorAll('input[type=radio][name="annonce_du_test2"]');
        const dateInputTest2 = document.getElementById('dateTest2')

        dateInputTest2.style.display = 'none';

        Array.prototype.forEach.call(resultat_du_test2, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                dateInputTest2.style.display = 'block';
                dateInputTest2.required = true;
            } else {
                dateInputTest2.style.display = 'none';
                dateInputTest2.required = false;
            }
        }
    </script>
    <script>
        const resultViral = document.querySelectorAll('input[type=radio][name="prelevement_charge_virale"]');
        const formViral = document.getElementById('formViral');

        formViral.style.display = 'none';

        Array.prototype.forEach.call(resultViral, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                formViral.style.display = 'block';
            } else {
                formViral.style.display = 'none';
            }
        }
    </script>
    <script>
        const resultVIHC = document.querySelectorAll('input[type=radio][name="depistage_vih_conjoint"]');
        const formVIHC = document.getElementById('formVIHC');

        formVIHC.style.display = 'none';

        Array.prototype.forEach.call(resultVIHC, function(radio) {
            radio.addEventListener('change', changeHandlerAM);
        });

        function changeHandlerAM(event) {
            if (this.value == 'Oui') {
                formVIHC.style.display = 'block';
            } else {
                formVIHC.style.display = 'none';
            }
        }
    </script>
    <script>
        const recherche = document.getElementById('searchForm');

        const butPostnatale = document.getElementById('butPostnatale');
        const butPrenatale = document.getElementById('butPrenatale');

        const searchPostnatale = document.getElementById('searchPostnatale');
        const searchPrenatale = document.getElementById('searchPrenatale');

        const formPostnatale = document.getElementById('formPostnatale');
        const formPrenatale = document.getElementById('formPrenatale');

        const prenataleForm = document.getElementById('PrenataleForm');

        const imgBG = document.getElementById('imgBG');
        
        searchPostnatale.style.display = 'none';
        searchPrenatale.style.display = 'none';
        formPostnatale.style.display = 'none';
        formPrenatale.style.display = 'none';
        recherche.style.display = 'none';
        prenataleForm.style.display = 'none';

        $(document).ready(function(){
            // Gérer le clic sur le bouton
            $("#butPrenatale").click(function() {
                recherche.style.display = 'block';
                searchPostnatale.style.display = 'none';
                searchPrenatale.style.display = 'block';
                formPostnatale.style.display = 'none';
                formPrenatale.style.display = 'none';
                imgBG.style.display = 'none';
            });
        });
        $(document).ready(function(){
            // Gérer le clic sur le bouton
            $("#butPostnatale").click(function() {
                recherche.style.display = 'block';
                searchPrenatale.style.display = 'none';
                searchPostnatale.style.display = 'block';
                formPostnatale.style.display = 'none';
                formPrenatale.style.display = 'none';
                imgBG.style.display = 'none';
            });
        });

        function calculateAge(birthDate) 
        {
            var today = new Date();
            var birth = new Date(birthDate);
            var age = today.getFullYear() - birth.getFullYear();
            var m = today.getMonth() - birth.getMonth();
            
            if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) {
                age--;
            }
            
            return age;
        }

        function ResearchPostnatale() 
        {
            var codePN = $('#code_postnatale').val();
                if (codePN.length == '') {
                    Swal.fire({
                        text: " Mettez un code svp !",
                        icon: "error",
                        button: "ok",
                    });
                    return false;
                }
            $.ajax({
                url: "{{ route('doctor.suivie.searchpostnatale', ':code') }}".replace(':code', codePN),
                type: 'GET',
                success: function(response) {
                        if (response.patient) {
                            var patient = response.patient;
                            var suivi = response.suivi;
                            Swal.fire({
                                text: "Patient trouvé . ",
                                icon: "success",
                                button: "ok",
                            });
                            formPrenatale.style.display = 'none';
                            formPostnatale.style.display = 'block';
                            searchPostnatale.style.display = 'none';
                            var codeDMEnfant = document.getElementById('dm_enfant');
                            var DMEnfant = patient.code_patient;

                            codeDMEnfant.innerHTML = DMEnfant;
                            $('#enfant_id').val(patient.id);
                            
                            if (patient.user.name !== '') {
                                $('#birth_date').val(patient.birth_date);
                                $('#nom_enfant').val(patient.user.name);
                                $('#prenom_enfant').val(patient.user.prenom);
                                
                            }
                            if (patient.user.name !== '') {
                                $('#birth_date').prop('readonly', true);
                                $('#nom_enfant').prop('readonly', true);
                                $('#prenom_enfant').prop('readonly', true);
                            } 
                            if (patient.user.name == null){
                                $('#birth_date').prop('readonly', false);
                                $('#nom_enfant').prop('readonly', false);
                                $('#prenom_enfant').prop('readonly', false);
                            }
                            

                            var html = '<h2>Suivi Mère-Enfant</h2>';
                            html += '<div class="box">  <div class="table-responsive p-10"> <table id="example" class="table table-striped"> <thead class="bg-dark text-white"> <tr> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Prophylaxie ARV remise à l\'enfant</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de remise</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de la visite</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment de la visite</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Type d\'alimentation</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date du prélevement 1er PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment du prélèvement 1er PCR</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat 1er PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Annonce du résultat aux parents 1er PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'annonce 1er PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date du prélevement 2e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment du prélèvement 2e PCR</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat 2e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Annonce du résultat aux parents 2e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'annonce 2e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date du prélevement 3e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment du prélèvement 3e PCR</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat 3e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Annonce du résultat aux parents 3e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'annonce 3e PCR</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Initiation cotrimoxazole ( CTX )</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'initiation du CTX</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age à l\'initiation du CTX</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Enfant sous cotrimoxazole (CTX)</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Initiation Prophylaxie à l\'isoniazide ( INH )</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'initiation du INH</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age à l\'initiation du INH</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Enfant sous Prophylaxie à l\'isoniazide ( INH )</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date serologie VIH</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment du test</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat du test</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Annonce du resultat du test</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'annonce du test</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date serologie VIH 2</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age au moment du test 2</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat du test 2</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Annonce du resultat du test 2</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'annonce du test 2</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat final du suivi</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Site de transfert ou de référence</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date du statut final</span></th></tr> </thead> <tbody id="tableBody" style="border-radius: 10px">';
                            if (suivi.length > 0) {
                                for (var i = 0; i < suivi.length; i++) {
                                    html += '<tr>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].prophylaxie_arv_enfant + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_remise + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_visite_postnatale + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_de_la_visite + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].type_alimentation + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_1er_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_de_prelevement_1er_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_1er_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].annonce_resultat_parent_1er_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_annonce_1er_pcr + '</span></td>';
                                       
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_2e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_de_prelevement_2e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_2e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].annonce_resultat_parent_2e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_annonce_2e_pcr + '</span></td>';
                                       
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_3e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_de_prelevement_3e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_3e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].annonce_resultat_parent_3e_pcr + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_annonce_3e_pcr + '</span></td>';
                                       
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].enfant_sous_ctx + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_initiation_ctx + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_initiation_ctx + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].enfant_sous_ctx + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].enfant_sous_inh + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_initiation_inh + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_initiation_inh + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].enfant_sous_inh + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_vih + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_du_test + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_du_test + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].annonce_du_test + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_annonce_du_test + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_vih2 + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_au_moment_du_test2 + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_du_test2 + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].annonce_du_test2 + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_annonce_du_test2 + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_final_du_suivi + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].site_de_transfert + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_du_statut_final + '</span></td>';

                                    html += '</tr>';
                                }
                                } else {
                                    html += '<tr><td colspan="15"><p>Aucun suivi trouvé.</p></td></tr>';
                                }

                                html += '</tbody></table></div></div>';
                                $('#suivie-postnatale').html(html);
                        } else {
                            Swal.fire({
                                text: "Aucun patient trouvé ! ",
                                icon: "error",
                                button: "ok",
                            });
                        }
                    },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.error;
                        Swal.fire({
                            text: errorMessage,
                            icon: "error",
                            button: "ok",
                        });
                }
                
            });

        }

        function ResearchPrenatale() 
        {
            var codePR = $('#code_prenatal').val();
                if (codePR.length == '') {
                    Swal.fire({
                        text: " Mettez un code svp !",
                        icon: "error",
                        button: "ok",
                    });
                    return false;
                }
            $.ajax({
                url: "{{ route('doctor.suivie.searchprenatale', ':code') }}".replace(':code', codePR),
                type: 'GET',
                success: function(response) {
                    if (response.patient) {
                        var patient = response.patient;
                        var suivi = response.suivi;
                        Swal.fire({
                            text: "Patient trouvé . ",
                            icon: "success",
                            button: "ok",
                        });
                        formPrenatale.style.display = 'block';
                        formPostnatale.style.display = 'none';
                        searchPrenatale.style.display = 'none';
                        var codPRmere = document.getElementById('dm_patient');
                        var DM = patient.code_patient;

                        codPRmere.innerHTML = DM;
                        $('#patient_id').val(patient.id);
                        $('#birth_date').val(patient.birth_date);
                        $('#name').val(patient.user.name + ' ' + patient.user.prenom);
                        var age = calculateAge(patient.birth_date);
                        $('#age').val(age);

        
                        var html = '<h2>Suivi Mère-Enfant</h2>';
                        html += '<div class="box">  <div class="table-responsive p-10"> <table id="example" class="table table-striped"> <thead class="bg-sme"> <tr> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de la visite</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Age gestationnel</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Status ARV à l\'enregistrement</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date d\'initiation du traitement ARV</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Mère toujours sous ARV</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Cotrimoxazole</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Prélèvement pour charge virale</span></th><th style="border-radius: 5px"><span class="badge fw-bold fw-14">Resultat de la charge virale</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de prélèvement</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date de reception du résultat</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Dépistage VIH du conjoint</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Résultat</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date du dépistage</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Issue de grossesse</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Date probable d\'accouchement</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Accouchement gemellaire</span></th> <th style="border-radius: 5px"><span class="badge fw-bold fw-14">Méthode de contraception moderne</span></th> </tr> </thead> <tbody id="tableBody" style="border-radius: 10px">';
                            if (suivi.length > 0) {
                                for (var i = 0; i < suivi.length; i++) {
                                    html += '<tr>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_visite + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].age_gestationnel + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].statut_arv + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_initiation_arv + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].mere_sous_arv + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].cotrimoxazole + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].prelevement_charge_virale + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_charge_virale + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_prelevement_virale + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_de_reception_resultat + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].depistage_vih_conjoint + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].resultat_vih_conjoint + '</span></td>';

                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_depistage_vih_conjoint + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].issue_de_la_grossesse + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].date_probable_accouchement + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].accouchement_gemellaire + '</span></td>';
                                        html += '<td><span class="badge text-dark fw-bold fs-14"> ' + suivi[i].methode_de_contraception_moderne + '</span></td>';
                                    html += '</tr>';
                                }
                                } else {
                                    html += '<tr><td colspan="15"><p>Aucun suivi trouvé.</p></td></tr>';
                                }

                                html += '</tbody></table></div></div>';
                                $('#suivie').html(html);
                        
                    } else {
                        Swal.fire({
                            text: "Aucun patient trouvé ! ",
                            icon: "error",
                            button: "ok",
                        });
                        }
                    },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.responseJSON.error;
                        Swal.fire({
                            text: errorMessage,
                            icon: "error",
                            button: "ok",
                        });
                }
                
            });

        }

        $(document).ready(function() 
        {
            $('#formPrenatale').submit(function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url: "{{ route('doctor.suivie.storeprenatale') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            text: response.success,
                            icon: "success",
                            button: "ok",
                        });
                        $('#formPrenatale')[0].reset();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            var errorMessage = errors[key][0];
                            var inputElement = document.getElementById(key);
                            var inputElements = document.querySelectorAll('.form-control'); // Supposons que les IDs correspondent aux noms de champ
                            if (inputElement) {
                                var errorContainer = inputElement.closest('.form-group'); // Ajustez le sélecteur selon votre structure HTML
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
                                title: 'Error de validación', // Corrected spelling here
                                html: '<div class="text-danger">' + errorMessage + '</div>', // Added '+' operator here
                            });
                        }
                    }

                });
            });
        });
        $(document).ready(function() 
        {
            $('#formPostnatale').submit(function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url: "{{ route('doctor.suivie.storepostnatale') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            text: response.success,
                            icon: "success",
                            button: "ok",
                        });
                        $('#formPostnatale')[0].reset();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            var errorMessage = errors[key][0];
                            var inputElement = document.getElementById(key);
                            var inputElements = document.querySelectorAll('.form-control'); // Supposons que les IDs correspondent aux noms de champ
                            if (inputElement) {
                                var errorContainer = inputElement.closest('.form-group'); // Ajustez le sélecteur selon votre structure HTML
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
                                title: 'Error de validación', // Corrected spelling here
                                html: '<div class="text-danger">' + errorMessage + '</div>', // Added '+' operator here
                            });
                        }
                    }

                });
            });
        });
        $(document).ready(function() 
        {
            // Gérer le clic sur le bouton
            $("#addPrenatale").click(function() {
                // Afficher/masquer le formulaire en fonction de son état actuel
                $("#PrenataleForm").toggle();
            });
        });
        $(document).ready(function() 
        {
            // Gérer le clic sur le bouton
            $("#addPostnatale").click(function() {
                // Afficher/masquer le formulaire en fonction de son état actuel
                $("#PostnataleForm").toggle();
            });
        });
    </script>
    
@endsection