<div class="col-md-9">
    <div class="box">
        <div class="box-header bg-soins">
            <h4 class="box-title">Mode de sortie / Issue de consultation  : 
                
                <small class="subtitle"><span class="fs-16"></span>Préciser date et heure de sortie </small>
            </h4>						
        </div>
        <div class="box-body p-5 overflow-x-scroll">
            <form class="form-horizontal">
                <div class="form-group p-30" id="issue_consultation">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Selectionner le mode <span class="text-danger">*</span></label>
                            <select class="form-control" id="modeAdmission_id" name="nom_sortie">
                                <option value="" disabled selected>Selectionner...</option>
                                <option value="Sortie autorisée vers le domicile">Sortie autorisée vers le domicile</option>
                                <option value="Mutation vers un autre service">Mutation vers un autre service</option>
                                <option value="Référé/Mutation vers un autre établissement">Référé/Mutation vers un autre établissement</option>
                                <option value="Sortie contre avis médical">Sortie contre avis médical</option>
                                <option value="Décès">Décès</option>
                                <option id="autreModeSortie" value="autreSortieV">Autre</option>
                            </select>
                            <br />
                            <input type="text" id="autreModeSortieInput" name="nom_sortie" class="form-control" placeholder="Précisez le mode de sortie">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Date de sortie<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_sortie">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Heure de sortie<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="heure_sortie">
                        </div>
                        
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-warning btn-submit">Terminer</button>
            </form>
        </div>
    </div>
</div>
<script>
    const autreModeSortie = document.getElementById('modeAdmission_id');
    const autreModeSortieInput = document.getElementById('autreModeSortieInput');

    autreModeSortieInput.style.display = 'none';

    autreModeSortie.addEventListener('change', function(e) {

    if (autreModeSortie.value == "autreSortieV") {

        autreModeSortieInput.style.display = 'block';
        autreModeSortieInput.required = true;

    }

    if (autreModeSortie.value !== "autreSortieV") {

        autreModeSortieInput.style.display = 'none';
        autreModeSortieInput.required = false;

    }
    });

</script>