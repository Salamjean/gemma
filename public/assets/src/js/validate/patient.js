$(document).ready(function(){
    $('#formAdd').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('secretariat.patient.addpatient') }}",
            method: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    text: response.success,
                    icon: "success",
                    button: "ok",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#F7B662',
                    showCancelButton: true,
                    cancelButtonText: 'Inscrire autre patient',
                    confirmButtonText:"<a class='text-white' href='{{ route('secretariat.consultation.make') }}'><i class='ti-save-alt'></i>&nbsp;Faire une admission</a>",
                    reverseButtons: true,
                });
                $('#formAdd')[0].reset();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                
                for (var key in errors) {
                    var errorMessage = errors[key][0];
                    var inputElement = document.getElementById(key);
                    var inputElements = document.querySelectorAll('.form-control'); // Supposons que les IDs correspondent aux noms de champ
                    
                    if (inputElement) {
                        var errorContainer = inputElement.closest('.form-group'); // Ajustez le sélecteur selon votre structure HTML
                        var errorSpan = document.createElement('span');
                        errorSpan.className = 'text-danger';
                        errorSpan.textContent = errorMessage;
                        
                        if (errorMessage) {
                            errorContainer.appendChild(errorSpan);
                        }  
                    }

                    var radioElements = document.querySelectorAll('.c-inputs-stacked'); // Sélectionnez tous les champs radio
                    radioElements.forEach(function(radioElement) {
                        radioElement.addEventListener('click', function() {
                            var errorContainer = radioElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant
                            
                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });
                    var selectElements = document.querySelectorAll('.form-select'); // Sélectionnez tous les champs select
                    selectElements.forEach(function(selectElement) {
                        selectElement.addEventListener('click', function() {
                            var errorContainer = selectElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant
                            
                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });

                    inputElements.forEach(function(inputElement) {
                        inputElement.addEventListener('click', function() {
                            var errorContainer = inputElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant
                            
                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });

                        inputElement.addEventListener('input', function() {
                            var errorContainer = inputElement.closest('.form-group');
                            var errorSpan = errorContainer.querySelector('.text-danger'); // Sélectionner l'élément span d'erreur existant
                            
                            if (errorSpan) {
                                errorContainer.removeChild(errorSpan); // Supprimer l'élément span d'erreur existant
                            }
                        });
                    });
                }
                var errorMessage = '';
                for (var key in errors) {
                    errorMessage += errors[key][0] + '<br/>';
                }
                if (errors) {
                    Swal.fire({
                        icon: 'error',
                        html: '<div class="text-danger">' + errorMessage + '</div>', // Added '+' operator here
                    });
                }
            }

        });
    });
});