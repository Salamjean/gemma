@extends('layouts.dashboard', ['title' => 'Soins infirmier'])

@section('content')
    <div id="formIssue">

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Soins de <span
                                style="text-transform: capitalize;">{{ $care->admission->patient->user->name }}
                                {{ $care->admission->patient->user->prenom }}</span> terminée</h4>
                        <h6 class="box-subtitle">Veuillez donner une justification.</h6>
                    </div>
                </div>

                <form id="justificationForm">
                    @csrf
                    <h3 class="text-dark"><b>Informations requises</b></h3>
                    <div class="box">
                        <div class="box-body ribbon-box">
                            <section>

                                <input type="hidden" name="care_id" value="{{ $care->id }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="justification" class="form-label"> <br>Observation : </b><span
                                                    class="danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <textarea name="justification" class="form-control" id="justification" cols="30" rows="20"></textarea>
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

    <div id="prescription">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-lg-1"></div>

                            <div class="col-lg-5">
                                <h4 class="box-title">
                                    <img src="{{ asset('assets/uploads/valide.png') }}" alt="" srcset="">
                                </h4>
                                <h3 class="box-subtitle">Soins terminé.</h3>
                            </div>
                            <form id="prescriptionForm" class="col-lg-6">
                                <div class="box-subtitle" style="font-size:30px;margin-top: 30px;">Voulez vous :</div>
                                <div style="position: absolute;">

                                    <div class="div-group" style="margin-top: 30px; margin-left:30px;">
                                        <div class="c-inputs-stacked">
                                            <div style="padding-bottom: 25px">
                                                <input type="checkbox" id="ordonnance" name="postIssue" value="ordonnance">
                                                <label class="me-30" style="font-size: 20px;" for="ordonnance">Prescrire
                                                    une ordonnance</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="position: relative; bottom: 5px; right:5px;">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-submit"
                                                    style="background-color: rgb(0, 255, 55); margin-left:30px; border:none;">Accueil</a>
                                            </div>
                                            <div class="col-8">
                                                <button type="submit" class="btn btn-primary btn-submit">Generer les
                                                    formulaires</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div id="sectionPrescription">
        <div id="ordonnanceSection" class="prescription">
            <div class="row" id="ordonnanceContainer">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edition d'une ordonnanc externe</h4>
                            <h6 class="box-subtitle">Veuillez remplir le formulaire svp.</h6>
                        </div>
                        <form id="ordonnanceForm">
                            @csrf
                            <section>
                                <input type="hidden" name="care_id" value="{{ $care->id }}">
                                <form id="ordonnanceForm">
                                    <div class="container___fuild">

                                    </div>
                                    <div class="container__button">
                                        <button type="button" id="addMedicationButton" class="btn btn-add"> Ajouter un
                                            médicament</button>
                                        <button type="submit" class="btn btn-primary btn-submit">Valider
                                            l'ordonnance</button>
                                    </div>
                                </form>
                                <br />
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-submit"
                style="background-color: rgb(18, 1, 78) margin-left:30px; border:none;">
                Aller sur le tableau de bord
            </a>
        </div>

    </div>

    <div id="impDocomentOrdonnance">

    </div>

    <style>
        .prescription {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ccc;
        }

        .select2-selection {
            height: 40px !important;

        }

        .selection {
            align-content: center !important;
        }

        .container___fuild {
            padding-top: 30px;
            padding-bottom: 5px;
            max-width: 900px;
            margin: 0 auto;
        }

        .container__button {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            gap: 10px;
        }

        .select2 {
            max-width: 400px !important;
            margin-right: 10px !important;
        }

        .medication-item {
            margin-bottom: 10px;
            display: flex;
        }

        .medication-input {
            flex: 1;
            margin-right: 10px;
        }

        .medication-remove {
            flex: 0;
        }

        .btn-delete {
            background-color: red;
            color: white;
            border: none;

            &:hover {
                background-color: rgb(229, 100, 100);
                color: black;
            }
        }
    </style>

    <script>
        (function($) {
            "use strict";

            $("#sectionPrescription").css("display", "none");
            $("#prescription").css("display", "none");
            $("#ordonnanceSection").css("display", "none");

            //justification
            $('#justificationForm').on('submit', function(e) {

                e.preventDefault();
                var justification = $('textarea[name="justification"]').val();
                var careId = $('input[name="care_id"]').val();

                if (justification == '' || careId == '') {

                    Swal.fire({
                        text: "Veuillez donner une issue de soin svp!",
                        icon: "error",
                        button: "ok",
                    });

                    return false;

                }

                verifyJustification(justification, careId)

            });

            function verifyJustification(justification, careId) {
                console.log(justification, careId, 'ok')
                var data = {
                    "justification": justification,
                    "care_id": careId,
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('infirmier.care.issue') }}",
                    data: data,
                    success: function(response) {

                        if (response.status == 'error') {

                            Swal.fire({
                                text: "Pas de soins effectué pour cette admission!",
                                icon: "error",
                                button: "ok",
                            });
                            $("#prescription").css("display", "none");
                            $("#formIssue").css("display", "block");
                        }
                        if (response.status == 'success') {

                            Swal.fire({
                                text: "Observation validé!",
                                icon: "success",
                                button: "ok",
                            });

                            $("#formIssue").css("display", "none");
                            $("#prescription").css("display", "block");

                        }

                    }
                });


            }

            $('#prescriptionForm').on('submit', function(e) {

                e.preventDefault();
                let valeurCheck = []

                $.each($("input[name='postIssue']:checked"), function() {
                    valeurCheck.push($(this).val());
                });

                if (valeurCheck.length < 1) {

                    Swal.fire({
                        text: "Veuillez selectionner les formulaires que vous disirez ouvrir!",
                        icon: "error",
                        button: "ok",
                    });

                    return false;
                }

                if (valeurCheck.find(e => e == 'ordonnance'))
                    $("#ordonnanceSection").css("display", "block");

                $("#sectionPrescription").css("display", "block");

                $("#prescription").css("display", "none");

                return false;

            });

            function addMedicationItem() {
                const medicationItem = `<div class="medication-item">
                <select class="form-control select2 medication-input select custom-select-height" name="medicamentCode[]" data-placeholder="Nom du médicament" style="width: 100%;" required>
                    <option value="" selected disabled data-select2-id="1">Nom du médicament</option>
                    @foreach ($drugs as $drug)
                        <option value="{{ $drug->id }}">{{ $drug->drug->name }}</option>
                    @endforeach
                </select>
                <select class="form-control select bg-white me-2" name="medicamentPosologie[]" data-placeholder="Posologie" style="width: 200px;" required>
                    <option value="" selected disabled>Posologie</option>
                    @foreach (listePosologies() as $item)
                        <option value="{{ $item }}"> {{ $item }}</option>
                    @endforeach
                </select>
                <input type="number" class="medication-input form-control input-qteO" name="medicamentQte[]" placeholder="Quantité" min="1" value="1" required>
                <button type="button" class="medication-remove btn btn-delete"><span class="fa fa-trash"></span></button>
                </div>`;

                $(".container___fuild").append(medicationItem);

                $(".custom-select-height").select2({
                    width: "100%",
                    placeholder: "Code du médicament"
                });
            }

            $("#addMedicationButton").click(function() {
                addMedicationItem();
            });

            $(document).on("click", ".medication-remove", function() {
                $(this).parent().remove();
            });

            //ordonnance
            $('#ordonnanceForm').on('submit', function(e) {

                e.preventDefault();

                var data = $(this).serialize();

                storeOrdonnance(data)

            });

            function storeOrdonnance(data) {
                console.log(data)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('infirmier.care.ordonnance', $care->id) }}",
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'error') {
                            Swal.fire({
                                text: response.message,
                                icon: "error",
                                button: "ok",
                            });
                        }
                        if (response.status == 'success') {
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                button: "ok",
                            });

                            var imp =
                                `<div style="font-size:18px; padding:10px;"><a href="{{ url('consultation/post/imprimer/ordonnance/${response.id}') }}" target="_blank" class="btn" style="background-color:green; color:white">Imprimer l'ordonnance <span class="fa fa-print"></span></a></div>`;
                            $("#impDocomentOrdonnance").append(imp);
                            $('#ordonnanceContainer').css("display", "none")

                        }

                    }

                });

            }


        })(jQuery);
    </script>
@endsection
