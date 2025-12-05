<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Enregistrement d'une déclaration de naissance. <span
                        style="text-transform: capitalize;">{{ $consultation->patient->user->name }}
                        {{ $consultation->patient->user->prenom }}</span></h4>
                <h6 class="box-subtitle">La déclaration de naissance se fait avec les identifiants de la mère.</h6>
            </div>
        </div>

        <form id="formAdd" action="{{ route('doctor.consultation.store.naissance') }}" method="POST">
            @csrf

            <h3 class="text-dark"><b>Remplissez le formulaire</b></h3>

            <div class="box">
                <div class="box-body ribbon-box">
                    <div class="ribbon ribbon-dark">Données sur le Patient</div>

                    <div class="mb-0">
                        <section>
                            <br /><br /><br />
                            <div class="row">
                                <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">

                                    <input type="hidden" name="patient_id" value="{{ $consultation->patient_id }}" required>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="form-label"> <b>Nom & prénoms

                                            de la mère
                                        </b>
                                            <span class="danger">*</span> </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $consultation->patient->user->name }} {{ $consultation->patient->user->prenom }}"
                                                disabled>
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
                                                value="{{ $consultation->patient->birth_date }} ({{ Carbon\Carbon::parse($consultation->patient->birth_date)->diffInYears(Carbon\Carbon::now()) }} ans)" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="genre" class="form-label"> <b>Nombre de naissance déclaré : </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="ti-spray"></i></span>
                                            <input type="genre" name="genre" class="form-control"
                                                value="{{ $consultation->patient->mere->count() }}" disabled>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mResidenceHactuel" class="form-label"> <b>Genre de l'enfant: </b><span class="danger">*</span>
                                    </label>
                                    <div class="c-inputs-stacked">
                                        <input type="radio" id="mmasculin" value="masculin" name="genre"
                                            required>
                                        <label for="mmasculin" class="me-30">Masculin</label>
                                        <input type="radio" id="mfeminin" value="feminin" name="genre">
                                        <label for="mfeminin" class="me-30">Feminin</label>
                                    >>>>>>>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="heure" class="form-label"> <b>Heure de naissance : </b><span
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
                                    <label for="poids" class="form-label"> <b>Poids de l'enfant : </b><span
                                            class="danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input type="text" name="poids" class="form-control" placeholder="5.6 (kg)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="taille" class="form-label"> <b>Taille de l'enfant : </b><span
                                            class="danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input type="text" name="taille" class="form-control" placeholder="0.3 (cm)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pere" class="form-label"> <b>Nom & Prénoms du père de l'enfant : </b>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <input type="text" name="pere" class="form-control"">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="lieu" class="form-label"> <b>Lieu de naissance : </b><span
                                            class="danger">*</span>
                                    </label>
                                    <div class="c-inputs-stacked">

                                        <input type="radio" id="lieu1" value="Déjà née à l'arriver" name="lieu"
                                            required>
                                        <label for="lieu1" class="me-30">Déjà née à l'arriver</label>

                                        <input type="radio" id="lieu2" value="Service d'hospitalisation"
                                            name="lieu">
                                        <label for="lieu2" class="me-30">Service d'hospitalisation</label>

                                        <input type="radio" id="lieu3" value="En cours de consultation"
                                            name="lieu">
                                        <label for="lieu3" class="me-30">En cours de consultation</label>

                                        <input type="radio" id="lieu4" value="Aux urgences" name="lieu">
                                        <label for="lieu4" class="me-30">Aux urgences</label>

                                        <input type="radio" id="lieu5" value="En cours d'évacuation"
                                            name="lieu">
                                        <label for="lieu5" class="me-30">En cours d'évacuation</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observation" class="form-label"> <br>Observation : </b><span
                                            class="danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <textarea name="observation" class="form-control" id="observation" cols="30" rows="10"></textarea>
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