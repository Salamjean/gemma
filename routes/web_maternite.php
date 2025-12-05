<?php

use App\Http\Controllers\Doctor\Maternite\SuivieController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    //Agent routes
    Route::middleware('isDoctor')->group(function () {
        Route::prefix('doctor')->name('doctor.')->middleware('isMaternite')->namespace('\App\Http\Controllers\Doctor')->group(function () {

            Route::prefix('consultation')->name('consultation.')->group(function () {
                Route::prefix('pre-natal')->name('pre-natal.')->group(function () {
                });

                Route::prefix('post-natal')->name('post-natal.')->group(function () {
                });

                Route::prefix('accouchement')->name('accouchement.')->group(function () {
                });

            });
            Route::prefix('suivie')->name('suivie.')->group(function () {
                Route::get('suivie-mere-enfant', [SuivieController::class, 'suivieMereEnfant'])->name('suivie');
                Route::get('search/postnatale/{data}', [SuivieController::class, 'searchPostnatale'])->name('searchpostnatale');
                Route::get('search/prenatale/{data}', [SuivieController::class, 'searchPrenatale'])->name('searchprenatale');

                Route::post('store/prenatale', [SuivieController::class, 'storePrenatale'])->name('storeprenatale');
                Route::post('store/postnatale', [SuivieController::class, 'storePostnatale'])->name('storepostnatale');
            });


        });
    });
});