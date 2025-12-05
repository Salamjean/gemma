<div class="col-md-9">
    <div class="box">
        <div class="box-header bg-soins">
            <h4 class="box-title">Mode D'admission : 
                <small class="subtitle"><span class="fs-16"></span>Préciser date et heure de l'admission</small>
            </h4>						
        </div>
        <div class="box-body p-2 overflow-x-scroll">
            <form class="form-horizontal">
                <div class="form-group" id="mode_admission">
                    <div class="row p-30">
                        <div class="col-md-6">
                            <label class="form-label">Selectionner le mode <span class="text-danger">*</span></label>
                            <select class="form-control" id="modeAdmission_id" name="modeAdmission">
                                <option value="" disabled selected>Selectionner...</option>
                                <option value="Consultation">Consultation</option>
                                <option value="Urgences">Urgences</option>
                                <option value="Mutation d'un autre service">Mutation d'un autre service</option>
                                <option value="Référé/Mutation vers un autre établissement de santé">Référé/Mutation vers un autre établissement de santé</option>
                                <option id="autreModeAdmission" value="autreAdmissionV">Autre</option>
                            </select>
                            <br />
                            <input type="text" id="autreModeAdmissionInput" name="nom_admission" class="form-control" placeholder="Précisez le mode d'admission">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Date d'admission<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" placeholder="Précisez la date du soins" name="date_admission">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Heure d'admission<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" placeholder="Précisez l'heure" name="heure_admission">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning btn-submit">Terminer</button>
            </form>
        </div>
    </div>
</div>
<script>
    const autreModeAdmission = document.getElementById('modeAdmission_id');
    const autreModeAdmissionInput = document.getElementById('autreModeAdmissionInput');

    autreModeAdmissionInput.style.display = 'none';

    autreModeAdmission.addEventListener('change', function(e) {

    if (autreModeAdmission.value == "autreAdmissionV") {

        autreModeAdmissionInput.style.display = 'block';
        autreModeAdmissionInput.required = true;

    }

    if (autreModeAdmission.value !== "autreAdmissionV") {

        autreModeAdmissionInput.style.display = 'none';
        autreModeAdmissionInput.required = false;

    }
    });

</script>