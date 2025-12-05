<?php

namespace App\Repositories\Infirmier;

use App\Models\CareDrug;
use App\Models\CareNeed;
use App\Models\CareRequested;
use App\Models\DrugHospital;
use Illuminate\Http\Request;

class CareRepository
{

    protected $careRequested;
    public function __construct(CareRequested $careRequested)
    {
        $this->careRequested = $careRequested;
    }

    public function storeInjection(Request $request): array
    {
        //dd($request->all());
        $drugsByInjection = array();
        foreach ($request->drugHospitalId as $key => $item) {
            $separ = explode(" || ", $item);
            //dd($separ);
            if (count($separ) >= 2)
                $drugsByInjection[$key] = [$separ[0], $separ[1], $request->quantity[$key], $request->dosage[$key]];
        }

        $price = 0;

        //save careNeeds
        foreach ($request->injectionId as $index => $item) {

            $careNeed = new CareNeed();
            $careNeed->injection_id = $request->injectionId[$index];
            $careNeed->care_requested_id = $this->careRequested->id;
            $careNeed->save();

            $total_drug = 0;

            //save careDrugs
            foreach ($drugsByInjection as $key => $drugByInjection) {
                if ($drugByInjection[0] == $item) {
                    $drug = DrugHospital::find($drugByInjection[1]);
                    $careDrug = new CareDrug();
                    $careDrug->care_need_id = $careNeed->id;
                    $careDrug->drug_hospital_id = $drug->id;
                    $careDrug->price = $drug->price;
                    $careDrug->quantity = $drugByInjection[2];
                    $careDrug->total_price = $drug->price * $drugByInjection[2];
                    $careDrug->dosage =  $drugByInjection[3];
                    $careDrug->save();

                    $total_drug += $careDrug->total_price;
                }
            }

            $careNeed->total_drug = $total_drug;
            $careNeed->save();

            $price += $careNeed->total_drug;
        }

        $this->careRequested->price = $price;
        $this->careRequested->save();

        return [
            'status' => 'success',
            'message' => 'ok'
        ];
    }

    public function storeBandage(Request $request): array
    {
        $drugsByPansement = array();
        foreach ($request->drugHospitalId as $key => $item) {
            $separ = explode(" || ", $item);
            if (count($separ) >= 2)
                $drugsByPansement[$key] = [$separ[0], $separ[1], $request->quantity[$key], $request->dosage[$key]];
        }

        $price = 0;
        //save careNeeds
        foreach ($request->pansementId as $index => $item) {
            $careNeed = new CareNeed();
            $careNeed->bandage_id = $request->pansementId[$index];
            $careNeed->care_requested_id = $this->careRequested->id;
            $careNeed->save();

            $total_drug = 0;

            foreach ($drugsByPansement as $key => $drugByPansement) {
                if ($drugByPansement[0] == $item) {
                    $drug = DrugHospital::find($drugByPansement[1]);
                    $careDrug = new CareDrug();
                    $careDrug->care_need_id = $careNeed->id;
                    $careDrug->drug_hospital_id = $drug->id;
                    $careDrug->price = $drug->price;
                    $careDrug->quantity = $drugByPansement[2];
                    $careDrug->total_price = $drug->price * $drugByPansement[2];
                    $careDrug->dosage =  $drugByPansement[3];
                    $careDrug->save();

                    $total_drug += $careDrug->total_price;
                }
            }

            $careNeed->total_drug = $total_drug;

            $careNeed->save();

            $price += $careNeed->total_drug;
        }

        $this->careRequested->price = $price;
        $this->careRequested->save();

        return [
            'status' => 'success',
            'message' => 'ok'
        ];
    }

    public function storeCare(Request $request): array
    {
        $drugsBySoins = array();
        foreach ($request->drugHospitalId as $key => $item) {
            $separ = explode(" || ", $item);
            //dd($separ);
            if (count($separ) >= 2)
                $drugsBySoins[$key] = [$separ[0], $separ[1], $request->quantity[$key], $request->dosage[$key]];
        }


        $price = 0;

        //save careNeeds
        foreach ($request->soinId as $index => $item) {
            $careNeed = new CareNeed();
            $careNeed->care_id = $request->soinId[$index];
            $careNeed->care_requested_id = $this->careRequested->id;
            $careNeed->save();

            $total_drug = 0;

            foreach ($drugsBySoins as $key => $drugBySoins) {
                if ($drugBySoins[0] == $item) {
                    $drug = DrugHospital::find($drugBySoins[1]);
                    $careDrug = new CareDrug();
                    $careDrug->care_need_id = $careNeed->id;
                    $careDrug->drug_hospital_id = $drug->id;
                    $careDrug->price = $drug->price;
                    $careDrug->quantity = $drugBySoins[2];
                    $careDrug->total_price = $drug->price * $drugBySoins[2];
                    $careDrug->dosage =  $drugBySoins[3];
                    $careDrug->save();

                    $total_drug += $careDrug->total_price;
                }
            }

            $careNeed->total_drug = $total_drug;

            $careNeed->save();

            $price += $careNeed->total_drug;
        }

        $this->careRequested->price = $price;
        $this->careRequested->save();

        return [
            'status' => 'success',
            'message' => 'ok'
        ];
    }
}
