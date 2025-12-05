<form action="{{ route('infirmier.care.store', $care->id) }}" id="formSubmit" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header text-dark">
                        INFORMATIONS RELATIVES A LA PRISE EN CHARGE DU PATIENT
                    </div>
                    <div class="box-body">
                        <div id="injection__item">
                            <div class="row p-4 mb-10" id="injection_item" data-drug-counter="0">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-warning add__injection__btn"
                                        style="height: 40px;"><span class="mx-2">Ajout d'injection</span><span
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
        function addInjection() {
            var uniqueId = `injection_item_${Date.now()}`;
            $('#injection__item').append(`
            <div class="row p-4 rounded-3 border border-warning mb-10" id="${uniqueId}" data-drug-counter="0">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="text-label">Selectionner l'injection</label>
                        <select class="form-select select2 custom-select-heightI" name="injectionId[]" required>
                            <option selected disabled>Selectionner</option>
                            @foreach ($injections as $injection)
                                <option value="{{ $injection->id }}">{{ $injection->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-7 d-flex justify-content-end items-center">
                    <div class="col-md-1 mt-20 add_item">
                        <button type="button" class="btn btn-danger remove__injection__btn">
                            <i class="fa-solid fa-remove" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="drug__item"></div>
                <div class="col-md-3 mt-20 add_item">
                    <button type="button" class="btn btn-success add__drug__btn">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajout produit
                    </button>
                </div>
            </div>
        `);

            $(".custom-select-heightI").select2({
                width: "100%",
            });

            $(document).on("click", ".remove__injection__btn", function() {
                $(this).closest(".row").remove();
            });

            $(`#${uniqueId} .add__drug__btn`).click(addDrug);
        }

        function addDrug() {
            var closestInjectionSection = $(this).closest(".row");
            var drugCounter = parseInt(closestInjectionSection.data("drug-counter")) + 1;
            closestInjectionSection.data("drug-counter", drugCounter);
            var uniqueId = `drug_item_${Date.now()}`;

            var injectionId = closestInjectionSection.find("select[name='injectionId[]']").val();

            closestInjectionSection.find(".drug__item").append(`
            <div class="row" id="${uniqueId}">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-label">Nom du produit</label>
                            <select class="form-select select2 custom-select-heightI" name="drugHospitalId[]" required>
                                <option selected disabled>Selectionner</option>
                                @foreach ($drugs as $drug)
                                    <option value="${injectionId} || {{ $drug->id }}">{{ $drug->drug->name }}</option>
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

        $('.add__injection__btn').click(addInjection);

        $("#formSubmit").submit(function(e) {
            e.preventDefault();

            var injectionsCount = $("#injection__item .row").length;
            var drugsCount = $("#injection__item .drug__item .row").length;

            if (injectionsCount === 0 || drugsCount === 0) {
                Swal.fire({
                    title: 'Erreur!',
                    text: 'Veuillez ajouter au moins un médicament à chaque injection avant de valider.',
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
