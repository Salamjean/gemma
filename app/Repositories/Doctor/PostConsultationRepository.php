<?php

namespace App\Repositories\Doctor;

use App\Models\DrugSale;
use App\Models\Ordonnance;
use App\Models\Prescription;
use App\Models\Registre;
use App\Models\ArretTravail;
use App\Models\Consultation;
use App\Models\Drug;
use App\Models\DrugHospital;
use Illuminate\Support\Facades\Auth;

class PostConsultationRepository
{
    public function __construct()
    {
        //
    }

    //ORDONNANCE externe
    public function storeOrdonnance($request)
    {
        $request->validate([
            'consultation_id' => 'required',
        ]);

        try {

            if (Ordonnance::where('type', 'externe')->where('consultation_id', $request->consultation_id)->exists()) {
                $exist = Ordonnance::where('consultation_id', $request->consultation_id)->first();
                $exist->prescriptions()->delete();
                $exist->delete();
            }

            //consultation
            $consultation = Consultation::findOrFail($request->consultation_id);

            //ordonnance
            $ordonnance = Ordonnance::create([
                "reference" => codeOrdonnance($consultation->patient->code_patient, $consultation->patient->id),
                "type" => 'externe',
                "consultation_id" => $request->consultation_id,
                "status" => 1,
                "date" => date('Y-m-d')
            ]);

            //save prescriptions
            foreach ($request->medicamentCode as $index => $item) {

                $drug = Drug::find($item);

                $prescription = new Prescription();
                $prescription->ordonnance_id = $ordonnance->id;
                $prescription->drug_id = $item;
                $prescription->quantity = $request->medicamentQte[$index] ?? 1;
                $prescription->dosage = $request->medicamentPosologie[$index] ?? $drug->posology;
                $prescription->route_administration = $request->routeAdministration[$index] ?? null;
                $prescription->duration = $request->duration[$index] ?? null;
                $prescription->health_dietetic_advice = $request->healthDieteticAdvice[$index] ?? null;
                $prescription->save();
            }

            return ['status' => 'success', 'message' => 'Ordonnance enregistrée avec succès.', 'id' => $ordonnance->id];
        } catch (\Throwable $err) {
            return ['status' => 'error', 'message' => $err->getMessage()];
        }
    }

    //ORDONANCE Interne
    public function storeOrdonnanceI($request)
    {
        $request->validate([
            'consultation_id' => 'required',
        ]);


        try {

            if (Ordonnance::where('type', 'interne')->where('consultation_id', $request->consultation_id)->exists()) {
                $exist = Ordonnance::where('consultation_id', $request->consultation_id)->first();
                $exist->prescriptions()->delete();
                $exist->delete();
            }

            //consultation
            $consultation = Consultation::findOrFail($request->consultation_id);

            //ordonnance
            $ordonnance = Ordonnance::create([
                "reference" => codeOrdonnance($consultation->patient->code_patient, $consultation->patient->id),
                "type" => 'interne',
                "consultation_id" => $request->consultation_id,
                "date" => date('Y-m-d')
            ]);

            $price = 0;
            //save prescriptions
            foreach ($request->medicamentCodeI as $index => $item) {

                $drug = DrugHospital::find($item);

                $prescription = new Prescription();
                $prescription->ordonnance_id = $ordonnance->id;
                $prescription->drug_id = $item;
                $prescription->quantity = $request->medicamentQteI[$index] ?? 1;
                $prescription->dosage = $request->medicamentPosologieI[$index] ?? $drug->posology;
                $prescription->route_administration = $request->routeAdministrationI[$index] ?? null;
                $prescription->duration = $request->durationI[$index] ?? null;
                $prescription->health_dietetic_advice = $request->healthDieteticAdviceI[$index] ?? null;
                $prescription->save();

                $price += ($request->medicamentQteI[$index] ?? 1) * $drug->price;
            }

            $drugSale = new DrugSale();
            $drugSale->type = 'ordonnance';
            $drugSale->hospital_id = Auth::user()->doctor->hospital_id;
            $drugSale->ordonnance_id = $ordonnance->id;
            $drugSale->price = $price;
            $drugSale->save();  

            return ['status' => 'success', 'message' => 'Ordonnance enregistrée avec succès.', 'id' => $ordonnance->id];
        } catch (\Throwable $err) {
            return ['status' => 'error', 'message' => $err->getMessage()];
        }
    }

    public function storeArretTravail($request)
    {
        $request->validate([
            'consultation_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'nb_jour' => 'required',
        ]);

        //consultation
        $consultation = Consultation::findOrFail($request->consultation_id);

        if (ArretTravail::where('consultation_id', $request->consultation_id)->exists()) {
            $exist = ArretTravail::where('consultation_id', $request->consultation_id)->first();
            $exist->delete();
        }

        $arretTravail = new ArretTravail();
        $arretTravail->code = codeArret($consultation->patient->code_patient, $consultation->patient->id);
        $arretTravail->consultation_id = $request->consultation_id;
        $arretTravail->date_debut = $request->date_debut;
        $arretTravail->date_fin = $request->date_fin;
        $arretTravail->nb_jour = $request->nb_jour;
        $arretTravail->save();

        return ['status' => 'success', 'message' => 'Arrêt de travail a été enregistré avec succès.', 'id' => $arretTravail->id];
    }
}
