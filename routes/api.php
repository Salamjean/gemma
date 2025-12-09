<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\OneSignalTokenController;
use App\Http\Controllers\api\Patient\DataController;
use App\Http\Controllers\api\ContactController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Ministere\MinistereController;
use App\Http\Controllers\api\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1/patient')->group( function () {
    
        Route::post('/sendMail', [ContactController::class, 'store']);
        // guest admin
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/confirm', [AuthController::class, 'confirmLogin']);
        //Liste des patients 
        Route::get('list', [PatientController::class, 'allPatients']);
        
        Route::get('cities', [DataController::class, 'cities']);

        Route::group(['middleware' => ['auth:sanctum']], function () {

            Route::post('update', [DataController::class, 'update']);
            Route::get('show', [DataController::class, 'show']);
            Route::post('one-signal/token', [OneSignalTokenController::class, 'store']);

            Route::get('consultations', [DataController::class, 'consultations']);
            Route::get('declarations', [DataController::class, 'declarations']);
            Route::post('rdv/create', [DataController::class, 'createRendezVous']);
            Route::get('rdv', [DataController::class, 'rendezVous']);
             Route::get('doctors', [DataController::class, 'getDoctors']);
  
            Route::get('rdv/{id}', [DataController::class, 'deleteRendezVous']);

        });
    }
);

Route::prefix('ministere')->group( function () {
    Route::get('/patients/today', [MinistereController::class, 'countPatientToday']);
    Route::get('/consultations/today', [MinistereController::class, 'countConsultationToday']);
    Route::get('/paiements/today', [MinistereController::class, 'countPaiementToday']);
    Route::get('/patients/hospitalise/today', [MinistereController::class, 'countPatientHospitaliseToday']);
   
}
);
