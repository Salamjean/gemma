<?php

namespace App\Repositories\Hospital;

use App\Models\Declaration;
use App\Models\Hospital;

class DeclarationHospitalRepository
{

    protected $hospitalId = null;
    protected $userId = null;
    public function __construct($hospital)
    {
        $this->userId = $hospital;
        $hospitalData = Hospital::where('user_id', $this->userId)->first();
        $this->hospitalId = $hospitalData->id;
    }

    public function model() {
        return Declaration::class;
    }

    public function birthGet(){
        return $this->model()::where('type_declaration_id', '1')->where('hospital_id', $this->hospitalId)->get();
    }

    public function deathGet(){
        return $this->model()::where('type_declaration_id', '2')->where('hospital_id', $this->hospitalId)->get();
    }

    public function search($type, $search){

    }
}
