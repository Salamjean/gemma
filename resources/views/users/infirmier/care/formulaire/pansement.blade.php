<form action="{{ route('infirmier.care.store', $care->id) }}" id="formSubmit" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box p-10">
                    <b><span>NB : <span class="text-danger">*</span> </span>
                    </b>
                    <p class="text-dark"> Cette partie permet de lister les produits pour la prise en charge du patient .</p>
                    <p> Il existe deux (2) types de pansements : </p>
                        <ul class="fw-bold">
                            <li>PANSEMENT COURANT</li>
                            <li>PANSEMENT LOURDS ET COMPLEXE</li>
                        </ul>
                    <p style="text-align: justify;">Avant de commencer, veuillez sélectionner au préalable le pansement(Courant / Complexe), en cliquant sur le bouton <b>"Ajout de pansement"</b> et les produits associés pour la prise en charge .</p>
                    <i>Si vous souhaitez faire plusieurs pansements, cliquez sur le button plus <span class="text-danger">(+)</span></i>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header text-dark fw-bold fs-18">
                        INFORMATIONS RELATIVES A LA PRISE EN CHARGE DU PATIENT
                    </div>
                    <div class="box-body">
                        <div id="pansement__item">
                            <div class="row p-4 mb-10" id="pansement_item" data-drug-counter="0">
                                <div>
                                    <button type="button" class="btn btn-info add__pansement__btn float-end"
                                        style="height: 40px;"><span class="mx-2">Ajout de pansement</span><span
                                            class="fa-solid fa-plus-circle"></span></button>
                                </div>
                                <div class="col-md-7 d-flex justify-content-end items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="float-end">
                            <button type="button" class="btn btn-warning me-1">
                                <i class="ti-trash"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti-save-alt"></i> Valider
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</form>
<div id="impression"></div>
<style>
    .select2-selection {
        height: 34px !important;
        width: 100%;
    }
</style>

<script>
    $(document).ready(function() {
        function addPansement() {
            var uniqueId = `pansement_item_${Date.now()}`;
            $('#pansement__item').append(`
            <div class="box bb-3 border-danger pe-5 pb-20 px-20 ps-10 pt-20 bg-color" id="${uniqueId}" data-drug-counter="0">
                <div class="float-end">
                    <button type="button" class="btn btn-sm btn-danger remove__pansement__btn float-end">X</button>
                </div>
                <div class="row mt-10">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="text-label">Sélectionner le pansement</label>
                            <select class="form-select select2 custom-select-heightI" name="pansementId[]" required>
                                <option selected disabled>Selectionner</option>
                                @foreach ($bandages as $pansement)
                                    <option value="{{ $pansement->id }}">{{ $pansement->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-20 mt-20 add_item">
                        <button type="button" class="btn btn-success add__drug__btn float-end">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajout produit
                        </button>
                    </div>
                    <div class="drug__item"></div>
                </div>
            </div>
        `);

            $(".custom-select-heightI").select2({
                width: "100%",
            });

            $(document).on('click', '.remove__pansement__btn', function(e) {
                e.preventDefault();
                let item = $(this).closest('.box');
                $(item).remove();
            });

            $(`#${uniqueId} .add__drug__btn`).click(addDrug);
        }

        function addDrug() {
            var closestPansementSection = $(this).closest(".row");
            var drugCounter = parseInt(closestPansementSection.data("drug-counter")) + 1;
            closestPansementSection.data("drug-counter", drugCounter);
            var uniqueId = `drug_item_${Date.now()}`;

            var pansementId = closestPansementSection.find("select[name='pansementId[]']").val();

            closestPansementSection.find(".drug__item").append(`
            <div class="row" id="${uniqueId}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-label">Nom du produit</label>
                            <select class="form-select select2 custom-select-heightI" name="drugHospitalId[]" required>
                                <option selected disabled>Selectionner</option>
                                @foreach ($drugs as $drug)
                                    <option value="${pansementId} || {{ $drug->id }}">{{ $drug->drug->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="text-label">Quantité</label>
                            <input type="text" class="form-control" name="quantity[]" required id="quantite" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-label">Dosage</label>
                            <input type="text" class="form-control" name="dosage[]" required id="quantite" />
                        </div>
                    </div>
                    <div class="col-md-1 mt-20 add_item">
                        <button type="button" class="btn btn-danger remove__drug__btn">
                            <i class="fa-solid fa-remove" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            `);

            $(".custom-select-heightI").select2({
                width: "100%",
            });

            $(`#${uniqueId} .remove__drug__btn`).click(function() {
                $(this).closest(".row").remove();
            });
        }

        $('.add__pansement__btn').click(addPansement);

        $("#formSubmit").submit(function(e) {
            e.preventDefault();

            var pansementsCount = $("#pansement__item .row").length;
            var drugsCount = $("#pansement__item .drug__item .row").length;

            if (pansementsCount === 0 || drugsCount === 0) {
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez ajouter au moins un médicament à chaque pansement avant de valider.',
                    icon: 'error',
                });
            } else {
                Swal.fire({
                    title: 'Etes vous sûr d\'enregistrer le médicament?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#formSubmit")[0].submit();
                        let timerInterval
                        Swal.fire({
                            title: 'Chargement!',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                    }
                });
            }
        });
    });
</script>
