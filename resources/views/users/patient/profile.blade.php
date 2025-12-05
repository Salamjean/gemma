@extends('layouts.patient', ['title' => 'Votre profile'])

@section('content')
    @php
        $user = Illuminate\Support\Facades\Auth::user();
    @endphp
    <div class="">
        <div class="px-5 md:px-0 max-w-4xl min-w-max mx-auto bg-white py-16 md:py-8 md:px-16 border-t-4 border-orange-400">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 border-b-2 pb-2 mb-5">
                <span clas="text-green-500 ">
                    <svg class="h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span class="tracking-wide text-2xl uppercase">Information sur vous</span>
            </div>

            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div class="">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nom</label>
                    <input type="text" value="{{ $user->name }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last
                        name</label>
                    <input type="text" value="{{ $user->prenom }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Code
                        bulletin medical</label>
                    <input type="text" value="{{ $user->patient->code_patient }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Genre</label>
                    <input type="text" value="{{ $user->patient->gender }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date de
                        naissance</label>
                    <input type="text" value="{{ $user->patient->birth_date }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pays de
                        naissance</label>
                    <input type="text" value="{{ $user->patient->country }}, {{ $user->patient->birthPlace->name }}"
                        disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type de
                        pièce</label>
                    <input type="text" value="{{ $user->patient->type_piece }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numéro de
                        pièce</label>
                    <input type="text" value="{{ $user->patient->numero_identite }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assuré
                    </label>
                    <input type="text" value="{{ $user->patient->assure }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numéro de
                        l'assurance</label>
                    <input type="text" value="{{ $user->patient->no_assurance }}" disabled
                        class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>

        </div>

        <div class="px-5 md:px-0 max-w-4xl mx-auto bg-white my-5 py-16 md:py-8 md:px-16 border-t-4 border-gray-400">
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 border-b-2 pb-2 mb-5">
                <span clas="text-green-500 ">
                    <svg class="h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <span class="tracking-wide text-2xl">Informations complémentaire</span>
            </div>
            <form id="updateDataPatient" enctype="multipart/form-data" action="{{ route('password.update') }}"
                method="post">
                <div class="mb-6">

                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                    " />

                    </label>
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Résidence
                            actuelle</label>
                        <input type="text" name="residence_actuelle" value="{{ $user->patient->currentResidence->name }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Abidjan">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Résidence
                            habituelle</label>
                        <input type="text" name="residence_habituelle"
                            value="{{ $user->patient->habitualResidence->name }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Gagnoa">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Profession</label>
                        <input type="text" name="profession" value="{{ $user->patient->profession }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Comptable">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Situation
                            matrimoniale</label>
                        <input type="text" name="situation_matrimoniale"
                            value="{{ $user->patient->situation_matrimoniale }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Célibataire">
                    </div>
                    <div>
                        <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact
                            1</label>
                        <input type="tel" id="phone" name="contact1"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="07 0405 1152" value="{{ $user->patient->telephone }}" pattern="[0-9]{10}">
                    </div>
                    <div>
                        <label for="phone2"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact
                            2</label>
                        <input type="tel" id="phone2" name="contact2"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="07 0405 1152" value="{{ $user->patient->contact2 }}" pattern="[0-9]{10}">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personne à contacter
                            en cas d'urgence</label>
                        <input type="text" name="nom_persn_sos"
                            value="{{ $user->patient->nom_personne_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John Wick">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact personne à
                            contacter en cas d'urgence</label>
                        <input type="text" name="tel_persn_sos"
                            value="{{ $user->patient->telephone_personne_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="07 0405 1152">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lien personne à
                            contacter en cas d'urgence</label>
                        <input type="text" name="lien_persn_sos"
                            value="{{ $user->patient->lien_personne_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Père">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Personne à contacter
                            en cas d'urgence 2</label>
                        <input type="text" name="nom_persn_sos2"
                            value="{{ $user->patient->nom_personne2_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Edwige Patricia">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact personne à
                            contacter en cas d'urgence 2</label>
                        <input type="text" name="tel_persn_sos2"
                            value="{{ $user->patient->telephone_personne2_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="07 0545 2511">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lien personne à
                            contacter en cas d'urgence 2</label>
                        <input type="text" name="lien_persn_sos2"
                            value="{{ $user->patient->lien_personne2_cas_urgence }}"
                            class="bg-gray-50 border p-2 px-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Mère">
                    </div>
                </div>
                <div class="mb-6">
                    <label for="adresse"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Adresse</label>
                    <input type="text" id="adresse" name="adresse"
                        class="bg-gray-50 p-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Abidjan, Cocody, Angré, Cocovico" value="{{ $user->patient->address }}">
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                        address</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 p-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" value="{{ $user->email }}">
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div class="">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mot
                            de passe</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 p-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••">
                    </div>
                    <div class="">
                        <label for="confirm_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mot de passe de
                            confirmation</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="bg-gray-50 p-2 px-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••">
                    </div>
                </div>

                <button type="submit" id="buttonsubmit"
                    class="text-white text-xl p-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer</button>
            </form>

            <p class="text-white">These input field components is part of a larger, open-source library of Tailwind CSS
                components. Learn
                more by going to the official
            </p>
        </div>
    </div>

    <script>
        (function($) {
            "use strict";

            $('#image').bind('change', function() {
                var a = 1;
                if ($('#buttonsubmit').attr('disabled', false)) {
                    $('#buttonsubmit').attr('disabled', true);
                }
                var ext = $('#image').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    Swal.fire({
                        text: "Image selectionné non prise en compte!",
                        icon: "error",
                        button: "ok",
                    });
                    a = 0;
                } else {

                    var picsize = (this.files[0].size);
                    if (picsize > 500000) {
                        Swal.fire({
                            text: "Taille max d'image accepté : 500ko!",
                            icon: "error",
                            button: "ok",
                        });
                        a = 0;
                    } else {
                        a = 1;
                    }

                    if (a == 1) {
                        $('#buttonsubmit').attr('disabled', false);
                    }
                }
            });

            //patient
            $("#updateDataPatient").on("submit", function(e) {
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

                if (nom_persn_sos2 != "" || tel_persn_sos2 != "" || lien_persn_sos2 != "") {
                    if (nom_persn_sos2 == "") {
                        Swal.fire({
                            text: " Veuillez renseignez le nom de la deuxième personne à contacter en cas d'urgence svp!",
                            icon: "error",
                            button: "ok",
                        });
                        return false;
                    }

                    if (tel_persn_sos2 == "") {
                        Swal.fire({
                            text: " Veuillez renseignez le contact de la deuxième personne à contacter en cas d'urgence svp!",
                            icon: "error",
                            button: "ok",
                        });
                        return false;
                    }

                    if (lien_persn_sos2 == "") {
                        Swal.fire({
                            text: " Veuillez renseignez votre lien avec la deuxième personne à contacter en cas d'urgence svp!",
                            icon: "error",
                            button: "ok",
                        });
                        return false;
                    }
                }

                var formData = new FormData(this);


                updatePatient(formData)
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
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function(response) {
                        if (response.status == "success") {
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                button: "ok",
                            });
                        }
                    },
                    error: function(response, status) {
                        var err = eval("(" + response.responseText + ")");
                        Swal.fire({
                            text: err.message,
                            icon: "error",
                            button: "ok",
                        });
                    },
                });
            }
        })(jQuery);
    </script>
@endsection
