<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accountant\SearchController;
use App\Http\Controllers\Accountant\RecetteController;
use App\Http\Controllers\Accountant\AssuranceController;

Route::middleware(['auth'])->group(function () {

    Route::middleware('isAccountant')->group(function () {
        Route::prefix('accountant')->name('accountant.')->namespace('\App\Http\Controllers\Accountant')->group(function () {

            Route::get('profile', 'AccountantController@profile')->name('profile');
            Route::put('update', 'AccountantController@update')->name('update');

            Route::prefix('recette')->name('recette.')->group(function () {
                Route::get('list', 'RecetteController@list')->name('list');
                Route::get('day/{day}', 'RecetteController@day')->name('day');
                Route::get('du_jour', [RecetteController::class, 'aujourdHui'])->name('du_jour');
                Route::get('historique', [RecetteController::class, 'historique'])->name('historique');
            });
            Route::get('recette/{day}', 'RecetteController@list')->name('recette');


            Route::prefix('search')->name('search.')->group(function () {
                Route::get('index', 'SearchController@index')->name('index');
                Route::get('treatment', [SearchController::class, 'treatment'])->name('treatment');
            });

            Route::prefix('assurance')->name('assurance.')->group(function () {
                Route::get('index', 'AssuranceController@index')->name('index');
                Route::get('search', 'AssuranceController@search')->name('search');
                Route::get('pdf/{date_beging}/{date_end}/{assurance_id}/{type}', 'AssuranceController@pdf')->name('pdf');
                Route::get('today', [AssuranceController::class, 'today'])->name('today');
                Route::get('historique', [AssuranceController::class, 'historique'])->name('historique');
            });
        });


    });
});
