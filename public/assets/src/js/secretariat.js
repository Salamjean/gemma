
$(document).ready(function() {
    // Gérer le clic sur le bouton
    $("#seeForm").click(function() {
        // Afficher/masquer le formulaire en fonction de son état actuel
        $("#formAdd").toggle();
        $('#formUpdate').hide();
    });
});
$(document).ready(function() {
    //afficher la balise Form
    $('#formAdd').show();
    $('#formUpdate').hide();
});      

// js pour admission

/**** recherche patient pour admission ****/
$(document).ready(function(){
    $('#search').on('keyup',function(){
    //var _token = $('input[name="_token"]').val();
    var query= $(this).val(); 
        if(query.length >= 2) {
            $.ajax({
            url:'{{ route("secretariat.patient.searchPatient") }}',
            type:"GET",
            data:{'search':query},
            success:function(data){ 
                $('#patient_list').fadeIn();
                    $('#patient_list').html(data);
            }
        });
        }
        else{
            $('#patient_list').empty();
        }
     //end of ajax call
});
$(document).on('click', 'li', function(){  
        $('#search').val($(this).text());  
        $('#patient_list').fadeOut();  
    });
$(document).on('click', 'option', function(){  
    $('#patient_id').val($(this).val());   
});
});

function convertToUppercase() {
var inputName = document.getElementById('name');
var inputPrenom = document.getElementById('prenom');
    inputName.value = inputName.value.toUpperCase();
    inputPrenom.value = inputPrenom.value.toUpperCase();
}


/** validation patient **/

