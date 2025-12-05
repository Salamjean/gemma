<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header bg-examen">
                <h4 class="box-title">EXAMENS REALISES :
                    <small class="subtitle">Préciser date de réalisation pour chaque examen</small>
                </h4>						
            </div>
            <div class="box-body p-5 overflow-x-scroll">
                <div class="form-group" id="examen_item">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Nom de l'examen<span class="text-danger">*</span></label>
                            <select name="type_examen" class="form-control" id="type_examen_id" name="type_examen"></select>

                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Date de l'examen<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" placeholder="Précisez la date de l'examen">
                        </div>
                        <div class="col-md-2 mt-20 add_item">
                            <button type="button" class="btn btn-success add_examen_btn" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        
        // Add input field
        $('.add_examen_btn').click(function() {
            $('#examen_item').append('<br/> <div class="row"> <div class="col-md-6"> <select name="type_examen" class="form-control" id="type_examen_id"></select></div><div class="col-md-4">  <input type="date" class="form-control" placeholder="Précisez la date de l examen"></div> <div class="col-md-2 mt-0 add_item"><button type="button" class="btn btn-sm btn-danger remove_examen_btn" >X</button></div></div>');
        });
        // Remove input field
        $(document).on('click', '.remove_examen_btn', function(e) {
            e.preventDefault();
            let examen_item = $(this).parent().parent();
            $(examen_item).remove();
        });
    });

   

    
</script>