(function ($) {
    "use strict";

    //patient
    $("#updateDataPatient").on("submit", function (e) {
        e.preventDefault();
        var image = $('input[name="image"]').val();
        var residence_actuelle = $('input[name="residence_actuelle"]').val();
        var residence_habituelle = $('input[name="residence_habituelle"]').val();
        var profession = $('input[name="profession"]').val();
        var situation_matrimoniale = $('input[name="situation_matrimoniale"]').val();
        var contact1 = $('input[name="contact1"]').val();
        var contact2 = $('input[name="contact2"]').val();
        var nom_persn_sos = $('input[name="nom_persn_sos"]').val();
        var tel_persn_sos = $('input[name="tel_persn_sos"]').val();
        var lien_persn_sos = $('input[name="lien_persn_sos"]').val();
        var nom_persn_sos2 = $('input[name="nom_persn_sos2"]').val();
        var tel_persn_sos2 = $('input[name="tel_persn_sos2"]').val();
        var lien_persn_sos2 = $('input[name="lien_persn_sos2"]').val();
        var adresse = $('input[name="adresse"]').val();
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        var confirm_password = $('input[name="confirm_password"]').val();


        if (residence_actuelle == '') {
            Swal.fire({
                text: " Veuillez renseignez la résidence actuelle svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (residence_habituelle == '') {
            Swal.fire({
                text: " Veuillez renseignez la résidence habituelle svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (profession == '') {
            Swal.fire({
                text: " Veuillez renseignez votre profession svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (situation_matrimoniale == '') {
            Swal.fire({
                text: " Veuillez renseignez votre situation matrimoniale svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (contact1 == '') {
            Swal.fire({
                text: " Veuillez renseignez votre contact 1 svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (nom_persn_sos == '') {
            Swal.fire({
                text: " Veuillez renseignez le nom de la personne à contacter en cas d'urgence svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (tel_persn_sos == '') {
            Swal.fire({
                text: " Veuillez renseignez le contact de la personne à contacter en cas d'urgence svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (lien_persn_sos == '') {
            Swal.fire({
                text: " Veuillez renseignez votre lien avec la personne à contacter en cas d'urgence svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (adresse == '') {
            Swal.fire({
                text: " Veuillez renseignez votre adresse svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        if (email == '') {
            Swal.fire({
                text: " Veuillez renseignez votre email svp!",
                icon: "error",
                button: "ok",
            });
            return false;
        }

        // if (nom_persn_sos2 == "" || tel_persn_sos2 != "" || lien_persn_sos2 != ""){
        //     if (nom_persn_sos2 == "") {
        //         Swal.fire({
        //             text: " Veuillez renseignez le nom de la deuxième personne à contacter en cas d'urgence svp!",
        //             icon: "error",
        //             button: "ok",
        //         });
        //         return false;
        //     }

        //     if (tel_persn_sos2 == "") {
        //         Swal.fire({
        //             text: " Veuillez renseignez le contact de la deuxième personne à contacter en cas d'urgence svp!",
        //             icon: "error",
        //             button: "ok",
        //         });
        //         return false;
        //     }

        //     if (lien_persn_sos2 == "") {
        //         Swal.fire({
        //             text: " Veuillez renseignez votre lien avec la deuxième personne à contacter en cas d'urgence svp!",
        //             icon: "error",
        //             button: "ok",
        //         });
        //         return false;
        //     }
        // }

        // var image = document.getElementById("image").files[0];

        // var maxSize = 500 * 1024;
        // if (image.size > maxSize) {
        //     Swal.fire({
        //         text: "L'image sélectionnée dépasse la limite de taille autorisée (500 Ko).",
        //         icon: "error",
        //         button: "ok",
        //     });
        //     return false;
        // }

        var data = {
            image: image,
            residence_actuelle: residence_actuelle,
            residence_habituelle: residence_habituelle,
            profession: profession,
            situation_matrimoniale: situation_matrimoniale,
            contact1: contact1,
            contact2: contact2,
            nom_persn_sos: nom_persn_sos,
            tel_persn_sos: tel_persn_sos,
            lien_persn_sos: lien_persn_sos,
            nom_persn_sos2: nom_persn_sos2,
            tel_persn_sos2: tel_persn_sos2,
            lien_persn_sos2: lien_persn_sos2,
            adresse: adresse,
            email: email,
            password: password,
            confirm_password: confirm_password,
        };
            

        updatePatient(data)
    });

    function updatePatient(data) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "{{ route('patient.update') }}",
            data: data,
            success: function (response) {
                if (response.status == "success") {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        button: "ok",
                    });
                }
            },
            error: function (response) {
                Swal.fire({
                    text: response.message,
                    icon: "error",
                    button: "ok",
                });
            },
        });
    }
})(jQuery);
