<?php

namespace App\Repositories\Infirmier;

use App\Models\Consultation;
use App\Models\Infirmier;
use Illuminate\Http\Request;
use App\Models\Registre;
use Illuminate\Support\Facades\Auth;

class DashboardInfirmierRepository
{

    protected $userId;
    protected $infirmierId;
    protected $hospitalId;

    public function __construct($infirmier)
    {
        $this->userId = $infirmier;
        $infirmierData = Infirmier::where('user_id', $this->userId)->first();
        $this->infirmierId = $infirmierData->id;
        $this->hospitalId = $infirmierData->hospital_id;
    }

    public function model()
    {
        return Infirmier::class;
    }
    public function consultation()
    {

        $consultations = Consultation::orderByDESC('created_at')->where('infirmier_id', Auth::user()->infirmier->id)->where('date_consultation', date('Y-m-d'))->where('status_inf', '0')->get();

        return $consultations;
    }

    public function makeConsult()
    {
        return Consultation::where('id', auth()->user()->infirmier->id)->where('date_consultation', date('Y-m-d'))->get();
    }
}
