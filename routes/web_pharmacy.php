<?php

use App\Http\Controllers\Pharmacy\DrugSaleController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::middleware('isPharmacist')->group(function () {

        Route::prefix('pharmacy')->name('pharmacy.')->namespace('\App\Http\Controllers\Pharmacy')->group(function () {

            Route::resource('drug', DrugController::class);

            Route::prefix('payment')->name('payment.')->group(function () {

                Route::get('pending', [DrugSaleController::class, 'pending'])->name('pending');
                Route::get('history', [DrugSaleController::class, 'history'])->name('history');
                Route::get('show/{id}', [DrugSaleController::class, 'show'])->name('show');
                Route::get('detail/{id}', [DrugSaleController::class, 'detail'])->name('detail');
                Route::get('pay/{id}', [DrugSaleController::class, 'pay'])->name('pay');

                Route::get('impression/{id}', [DrugSaleController::class, 'payImpression'])->name('payImpression');


                Route::get('indicate', [DrugSaleController::class, 'indicate'])->name('indicate');


            });

        });

    });
});
