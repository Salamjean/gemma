

@extends('layouts.dashboard',['title' => "Admission Patient Invoice" ])

@section('content')
    <!-- Main content -->
    <section class="invoice printableArea">
        <div class="row">
            <div class="col-12">
                <div class="bb-1 clearFix">
                    <div class="text-end pb-15">
                        <button class="btn btn-success" type="button"> <span><i class="fa fa-print"></i> Save</span> </button>
                        <button id="print2" class="btn btn-warning" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="page-header">
                    <img src="{{ asset('assets/images/logo/sante.png ')}}" class="logo-s" alt="">
                    <div class="pull-right text-end profile-image mb-30">
                        <img src="{{ asset('assets/images/logo/Armoirie.png ')}}" class="logo-a" alt="">
                    </div>
                </div>
            </div>
            <div class="l-center">
                <img src="{{ asset('assets/images/logo/diis.png ')}}" class="logo-di" alt="">
                <h3>DIRECTION DE L’INFORMATIQUE ET DE L’INFORMATION SANITAIRE</h3>
                <br/>
                <h3 class="fw-bold">SYSTEME D’INFORMATION DE GESTION (SIG) REGISTRE DE CONSULTATIONS CURATIVES DU SECTEUR PUBLIC </h3>
            </div>

            <!-- /.col -->
        </div>
        <div class="row">
            <section class="h-info-section box box-body">

                <ul class="list-unstyled">
                    <li><h3><strong>DIRECTION REGIONALE DE LA SANTE :</strong> ..........................................................................................................................</h3></li>
                    <li><h3><strong>District Sanitaire de :</strong> .............................................................................................................................................................</h3></li>
                    <li><h3><strong>Localité :</strong> ..........................................................................................................................................................................................</h3></li>
                    <li><h3><strong>Nom de la structure :</strong> .............................................................................................................................................................</h3></li>
                    <li><h3><strong>Nom du service :</strong> .......................................................................................................................................................................</h3></li>
                    <li><h3><strong>Code de la structure :</strong> ...........................................................................................................................................................</h3></li>
                    <li><h3><strong>Registre Numéro :</strong> ............................. <strong>Commencé le :</strong> ......../........./.......... <strong>Terminé le : </strong> ..................................</h3></li>
                </ul>

            </section>
            <hr/>
        </div>

        <section class="p-info-section box-body">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="box box-body">

                        <div class="tab-content">
                            <div class="tab-pane py-30 active show" id="about">
                                <ul class="list-unstyled">
                                    <li><h4><strong>Type d'admission:</strong> Nouvelle Admission</h4></li>
                                    <li><h4><strong>Mode d'admission:</strong> Consultation</h4></li>
                                    <li><h4><strong>Département:</strong> Pédiatrie</h4></li>
                                    <li><h4><strong>Protection sociale:</strong>Non assurer</h4></li>
                                    <li><h4><strong>Mode d'entrée:</strong> Par lui même </h4></li>
                                </ul>
                                <hr>
                                <h3><strong>Motif de la consultation</strong></h3>
                                <p>Consulatation pour corps chaud, la toux et le manque d'appétit</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box">
                        <div class="box-body">
                            <div class="workingtime">
                                <h5 class="fw-500"><b>Montant à payer : </b> <span class="badge badge-danger">16000 Frs CFA</span></h5>
                                <div class="fw-500"><b>Statut : </b><span class="badge badge-success">Consultation payé</span> </div><br/>
                                <div class="fw-500"><b>Approuvé par : </b> <span class="badge badge-info"> Mlle KASSI</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <div class="workingtime">
                                <h5 class="fw-500">Medecin en Charge</h5>
                                <small class="text-muted"><strong>Dr KOUA</strong></small>
                                <p><strong>Matricule :</strong> CI892200 &nbsp; <strong>Contact : </strong> +2250101232345</p>
                                <p><strong>Domaine :</strong> Médecin Généraliste</p>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="l-center">
            <img src="{{ asset('assets/images/logo/codebar.png ')}}" class="logo-cb" alt="">
        </div>
    </section>
    <!-- /.content -->
@endsection
