<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {

    //Patient routes
    Route::middleware('isPatient')->group(function () {
        Route::prefix('patient')->name('patient.')->namespace('\App\Http\Controllers\Patient')->group(function () {

            Route::get('setting', 'PatientController@setting')->name('setting');
            Route::post('update', 'PatientController@update')->name('update');
            Route::get('consultations', 'PatientController@consultations')->name('consultations');
            Route::get('declarations', 'PatientController@declarations')->name('declarations');
            Route::get('rendez-vous', 'PatientController@rendezVous')->name('rendez.vous');

            Route::get('impression/{type}/{id}', 'PatientController@Impression')->name('impression');


        });
    });

});
