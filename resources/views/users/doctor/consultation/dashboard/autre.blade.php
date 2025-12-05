<div class="container-dashboard">
    <div class="container-consultation">
        <div>

            @if ($action['bulletin'] == 0)
                <div class="title-consultation">
                    Menu Consultation

                </div>
                <section class="section-consultation">
                    <div class="section-item">
                        <div><a href="{{ route('doctor.consultation.formulaire', ['consultation-currative', $id] ) }}">Consultation curative</a></div>
                        <div class="section-action">

                        </div>

                    </div>

                </section>
            @endif

            <div class="title-consultation">Déclarations</div>
            <section class="section-consultation">

                @if ($action['deces_p'] == 0)
                    <div class="section-item">
                        <div><a href="{{ route('doctor.consultation.formulaire', ['declaration-deces-patient', $id] ) }}">Déclaration de décès du patient</a></div>
                        <div class="section-action">

                        </div>
                    </div>
                @endif
                <div class="section-item">
                    <div><a href="{{ route('doctor.consultation.formulaire', ['declaration-deces-enfant', $id] ) }}">Déclaration de décès d'un nouveau née</a></div>
                    <div class="section-action">

                    </div>

                </div>
            </section>
            @if ($action['hospitalisation'] == 0 && $action['observation'] == 0 && $action['arret_travail'] == 0)

                <div class="title-consultation">Observations</div>
                <section class="section-consultation">
                    @if ($action['hospitalisation'] == 0)
                        <div class="section-item">
                            <div><a href="{{ route('doctor.consultation.formulaire', ['hospitalisation', $id] ) }}">Hospitalisé le patient</a></div>
                            <div class="section-action">

                            </div>

                        </div>
                    @endif
                    @if ($action['observation'] == 0)
                        <div class="section-item">
                            <div><a href="{{ route('doctor.consultation.formulaire', ['observation', $id] ) }}">Mettre le patient sous observation</a></div>
                            <div class="section-action">

                            </div>

                        </div>
                    @endif
                    @if ($action['arret_travail'] == 0)
                        <div class="section-item">
                            <div><a href="{{ route('doctor.consultation.formulaire', ['arret-travail', $id] ) }}">Arrêt de travail</a></div>
                            <div class="section-action">

                            </div>

                        </div>
                    @endif
                </section>
            @endif
            @if ($action['ordonnance'] == 0)
                <div class="title-consultation">Ordonnance</div>
                <section class="section-consultation">

                    <div class="section-item">
                        <div><a href="{{ route('doctor.consultation.formulaire', ['ordonnance', $id] ) }}">Prescrire une ordonnance</a></div>
                        <div class="section-action">

                        </div>

                    </div>
                </section>
            @endif
            @if ($action['examen'] == 0)
                <div class="title-consultation">Examen</div>
                <section class="section-consultation">
                    <div class="section-item">
                        <div><a href="{{ route('doctor.consultation.formulaire', ['examen', $id] ) }}">Passer des examens au patient</a></div>
                        <div class="section-action">

                        </div>

                    </div>
                </section>
            @endif
            <div class="footer-consultation">
                <div>
                    <a href="#"><i class="fa fa-check-circle-o" style="margin-right: 10px;"></i>Consultation terminée</a>
                </div>
            </div>
        </div>

    </div>
</div>
