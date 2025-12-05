<div class="row" id="examenContainer">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edition d'un bulletin d'examen </h4>
                <h6 class="box-subtitle">Veuillez remplir le formulaire svp.</h6>
            </div>
            <form id="examenForm">
                @csrf
                <section>
                    <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">
                    <div class="container_fuild">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header bg-examen">
                                    <h4 class="box-title">EDITER UN EXAMEN : </h4>
                                </div>
                                <div class="box-body p-5 overflow-x-scroll">
                                    <div class="form-group" id="examen_item">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <label class="form-label">Nature de l'examen<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nature de l'examen" name="nature_examen[]">

                                            </div>
                                            <div class="col-md-3 mt-20 add_item">
                                                <button type="button" class="btn btn-success add_examen_btn" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary btn-submit mb-10" >Valider l'examen</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <br /><br />
</div>
<div id="impDocumentBulletinMedical">

</div>
<script>
    $(document).ready(function() {

    // Add input field
    $('.add_examen_btn').click(function() {
        $('#examen_item').append('<br/> <div class="row"> <div class="col-md-9"> <input type="text" class="form-control" placeholder="Nature de l\'examen" name="nature_examen[]"></div> <div class="col-md-3 mt-0 add_item"><button type="button" class="btn btn-sm btn-danger remove_examen_btn" >X</button></div></div>');
    });
    // Remove input field

    $(document).on('click', '.remove_examen_btn', function(e) {
        e.preventDefault();
        let examen_item = $(this).parent().parent();
        $(examen_item).remove();
    });

    });


    /** Validation de l'examen */

    $(document).ready(function() {
        $('#examenForm').submit(function(event) {
            event.preventDefault();
            var nomExamen = $('input[name="nature_examen[]"]').serialize();
            if (nomExamen.length == '') {
                Swal.fire({
                    text: " Mettez un nom d'examen svp !",
                    icon: "error",
                    button: "ok",
                });
                return false;

            }

            var formData = $(this).serialize();
            $.ajax({
				url: '{{ route("consultation.store.post.bulletin.examen") }}',
                type: "POST",
                data: formData,
				dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        Swal.fire({
                            text: response.error,
                            icon: "error",
                            button: "ok",
                        });
                    }
                    if (response.success) {
                            Swal.fire({
                            text: response.success,
                            icon: "success",
                            button: "ok",
                        });

                        var imp = `<div style="font-size:18px; padding:10px;"><a href="{{ url('consultation/post/imprimer/examen/${response.id}') }}" target="_blank" class="btn" style="background-color:blue; color:white">Imprimer le bulletin d'examen <span class="fa fa-print"></span></a></div>`;
                        $("#impDocumentBulletinMedical").append(imp);
                        $('#examenContainer').css("display", "none")

                    }

                    },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                        for (var key in errors) {
                            errorMessages += errors[key][0] + '<br>';
                        }
                    if (errors) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error de validation',
                            html: '<div class="text-danger"'+ errorMessages +'</div>',
                        });
                    }

                }
            });
        });
    });
</script>

<style>
    .container_fuild {
        padding-top: 30px;
        padding-bottom: 5px;
        max-width: 900px;
        margin: 0 auto;
    }
</style>
