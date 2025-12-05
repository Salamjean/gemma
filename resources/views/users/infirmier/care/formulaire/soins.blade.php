<form action="{{ route('infirmier.care.store', $care->id) }}" id="formSubmit" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box p-10">
                    <p><span>NB : <span class="text-danger">*</span> </span>
                    </p>
                    <p class="text-dark fs-18"> Cette partie permet de lister les produits pour la prise en charge du patient .</p>
                    <p> Il existe trois (3) types de soins : </p>
                        <ul class="fw-bold">
                            <li>SOINS PORTANT SUR L'APPAREIL RESPIRATOIRE</li>
                            <li>SOINS PORTANT SUR L'APPAREIL GENITO-URINAIRE </li>
                            <li>SOINS PORTANT SUR L'APPAREIL DIGESTIF </li>
                        </ul>
                    <p>Avant de commencer, veuillez sélectionner au préalable le Soins, le type de soins et les produits associés pour la prise en charge .</p>
                    <p>Si vous souhaitez faire plusieurs soins, cliquez sur le button plus <span class="text-danger">(+)</span></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header text-dark">
                        INFORMATIONS RELATIVES A LA PRISE EN CHARGE DU PATIENT
                    </div>
                    <div class="box-body">
                        <div id="soins__item">
                            <div class="row p-4 mb-10" id="soins_item" data-drug-counter="0">
                                <div>
                                    <button type="button" class="btn btn-info add__soins__btn float-end" style="height: 40px;">
                                        <span class="mx-2">Ajouter des soins</span><span class="fa-solid fa-plus-circle"></span>
                                    </button>
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
        function addSoins() {
            var uniqueId = `soins_item_${Date.now()}`;
            $('#soins__item').append(`
            <div class="box bb-3 border-danger pe-5 pb-20 px-20 ps-10 pt-20 bg-color" id="${uniqueId}" data-drug-counter="0">
                <div class="float-end">
                    <button type="button" class="btn btn-sm btn-danger remove__soins__btn float-end">X</button>
                </div>
                <div class="row mt-10">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="text-label">Sélectionner un soins</label>
                            <select class="form-select select2 custom-select-heightI" name="soinId[]" required>
                                <option selected disabled>Selectionner</option>
                                @foreach ($soins as $soin)
                                    <option value="{{ $soin->id }}">{{ $soin->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-20 mt-20 add_item">
                        <button type="button" class="btn btn-success add__drug__btn float-end">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un produit
                        </button>
                    </div>
                    <div class="drug__item"></div>
                </div>
            </div>
        `);

            $(".custom-select-heightI").select2({
                width: "100%",
            });

            $(document).on('click', '.remove__soins__btn', function(e) {
                e.preventDefault();
                let item = $(this).closest('.box');
                $(item).remove();
            });

            $(`#${uniqueId} .add__drug__btn`).click(addDrug);
        }

        function addDrug() {
            var closestSoinsSection = $(this).closest(".row");
            var drugCounter = parseInt(closestSoinsSection.data("drug-counter")) + 1;
            closestSoinsSection.data("drug-counter", drugCounter);
            var uniqueId = `drug_item_${Date.now()}`;

            var soinId = closestSoinsSection.find("select[name='soinId[]']").val();

            closestSoinsSection.find(".drug__item").append(`
            <div class="row" id="${uniqueId}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-label">Nom du produit</label>
                        <select class="form-select select2 custom-select-heightI" name="drugHospitalId[]" required>
                            <option selected disabled>Selectionner</option>
                            @foreach ($drugs as $drug)
                                <option value="${soinId} || {{ $drug->id }}">{{ $drug->drug->name }}</option>
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

        $('.add__soins__btn').click(addSoins);

        $("#formSubmit").submit(function(e) {
            e.preventDefault();

            var soinsCount = $("#soins__item .row").length;
            var drugsCount = $("#soins__item .drug__item .row").length;

            if (soinsCount === 0 || drugsCount === 0) {
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez ajouter au moins un médicament à chaque type de soins avant de valider.',
                    icon: 'error',
                });
            } else {
                Swal.fire({
                    title: 'Êtes-vous sûr d\'enregistrer le médicament?',
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
