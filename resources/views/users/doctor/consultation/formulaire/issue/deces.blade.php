<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Enregistrement d'une déclaration de décès</h4>
                <h6 class="box-subtitle">Le patient doit être enregistrés ou la mère du patient.</h6>
            </div>
        </div>

        <div>
            <form id="decesForm">
                @csrf

                <h3 class="text-dark"><b>Remplissez le formulaire</b></h3>

                <div class="box">
                    <div class="box-body ribbon-box">
                        <div class="ribbon ribbon-dark">Données sur le Patient</div>

                        <div class="mb-0">
                            <section>
                                <br /><br /><br />
                                <div class="row">
                                    <input type="hidden" name="person" id="personSelect" value="patient" required>
                                    <input type="hidden" name="patient_id" value="{{  $consultation->patient_id }}" required>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name" class="form-label"> <b>Nom & prénoms patient :
                                                </b>
                                                <span class="danger">*</span> </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="ti-user"></i></span>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $consultation->patient->user->name }} {{ $consultation->patient->user->prenom }}" disabled>
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
                                                    value="{{ $consultation->patient->birth_date }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="genre" class="form-label"> <b>Genre du Patient : </b>
                                            </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="ti-spray"></i></span>
                                                <input type="genre" name="genree" class="form-control"
                                                    value="{{ $consultation->patient->gender }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </section>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="1" name="nombre">
                <h3 class="text-dark"><b>Informations requises</b></h3>
                <div class="box">
                    <div class="box-body ribbon-box">
                        <div class="ribbon ribbon-danger">Registre de décès</div>
                        <section>
                            <br /><br /><br />

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mResidenceHactuel" class="form-label"> <b>Milieu de Résidence
                                                hatituelle: </b><span class="danger">*</span>
                                        </label>
                                        <div class="c-inputs-stacked">
                                            <input type="radio" id="mUrbain" value="Urbain"
                                                name="milieu_residence" required>
                                            <label for="mUrbain" class="me-30">Urbain</label>
                                            <input type="radio" id="mRural" value="Rural"
                                                name="milieu_residence">
                                            <label for="mRural" class="me-30">Rural</label>
                                            <input type="radio" id="mInconnu" value="Inconnu"
                                                name="milieu_residence">
                                            <label for="mInconnu" class="me-30">Inconnu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="date" class="form-label"> <b>Date de décès : </b><span
                                                class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" name="date" class="form-control"
                                                data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="{{ date('d/m/Y') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="heure" class="form-label"> <b>Heure de décès : </b><span
                                                class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-hourglass"></i>
                                            </div>
                                            <input type="text" name="heure" class="form-control"
                                                data-inputmask="'alias': 'hh:mm'" data-mask="" value="{{ date('H:i') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="deces_maternel" class="form-label"> <b>Décès maternel : </b>
                                            <span class="danger">*</span>
                                        </label>
                                        <select class="form-select required" id="deces_maternel"
                                            name="deces_maternel">
                                            <option value="" selected disabled>Selectionner</option>
                                            <option value="oui">Oui</option>
                                            <option value="non">Non</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="lieu" class="form-label"> <b>Lieu de décès : </b><span
                                                class="danger">*</span>
                                        </label>
                                        <div class="c-inputs-stacked">


                                            <input type="radio" id="lieu3" value="En cours de consultation"
                                                name="lieu" checked>
                                            <label for="lieu3" class="me-30">En cours de consultation</label>


                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cInitiale" class="form-label"> <br>Cause Initiale du décès :
                                            </b><span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <textarea name="cause_initiale" class="form-control" id="cInitiale" cols="30" rows="6" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cDirecte" class="form-label"> <br>Cause Directe du décès :
                                            </b><span class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <textarea name="cause_directe" class="form-control" id="cDirecte" cols="30" rows="6" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="observation" class="form-label"> <br>Observation : </b><span
                                                class="danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <textarea name="observation" class="form-control" id="observation" cols="30" rows="10" required></textarea>
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



<script>
    (function($) {
        "use strict";

        //Deces
        $('#decesForm').on('submit', function(e) {

            e.preventDefault();
            var consultationId = $('input[name="consultation_id"]').val();
            var person = $('input[name="person"]').val();
            var patientId = $('input[name="patient_id"]').val();
            var milieu_residence = $('input[name="milieu_residence"]:checked').val();
            var date = $('input[name="date"]').val();
            var heure = $('input[name="heure"]').val();
            var deces_maternel = $('select[name="deces_maternel"]').val();
            var lieu = $('input[name="lieu"]:checked').val();
            var cause_initiale = $('textarea[name="cause_initiale"]').val();
            var cause_directe = $('textarea[name="cause_directe"]').val();
            var observation = $('textarea[name="observation"]').val();

            if ( date == '' || heure == '' ) {

                if(date == ''){
                    Swal.fire({
                        text: "Veuillez renseigner la date de décès!",
                        icon: "error",
                        button: "ok",
                    });

                    return false;
                }

                if(heure == ''){
                    Swal.fire({
                        text: "Veuillez renseigner l'heure de décès!",
                        icon: "error",
                        button: "ok",
                    });

                    return false;

                }

            }

            var data = {
                "consultation_id": '{{  $consultation->id }}',
                "patient_id": patientId,
                "person": person,
                "milieu_residence": milieu_residence,
                "date": date,
                "heure": heure,
                "deces_maternel": deces_maternel,
                "lieu": lieu,
                "cause_initiale": cause_initiale,
                "cause_directe": cause_directe,
                "observation": observation,
                "nombre": 1,
            }

            verifyDeces(data)

        });

        function verifyDeces(data) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('doctor.consultation.store.issue.deces') }}",
                data: data,
                success: function(response) {

                    if (response.status == 'error') {

                        Swal.fire({
                            text: "Pas de consultation effectué pour cette admission!",
                            icon: "error",
                            button: "ok",
                        });
                        $("#prescription").css("display", "none");
                        $("#formIssue").css("display", "block");
                    }
                    if (response.status == 'success') {

                        Swal.fire({
                            text: "Issue de consultation validée!",
                            icon: "success",
                            button: "ok",
                        });

                        $("#formIssue").css("display", "none");
                        $("#prescription").css("display", "none");

                        var imp =
                            `<div style="font-size:18px; padding:10px;"><a href="{{ url('doctor/declaration/certificat/deces/${response.id}') }}" target="_blank" class="btn" style="background-color:green; color:white">Imprimer la déclaration <span class="fa fa-print"></span></a></div>`;
                        $("#impDocumentDeces").append(imp);

                    }

                }
            });


        }

    })(jQuery);
</script>
