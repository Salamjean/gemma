<?php

namespace App\Repositories\Hospital;

use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use App\Models\TypeConsultation;
use Illuminate\Support\Facades\Auth;

class ConsultationRepository
{
    public function model()
    {
        return Consultation::class;
    }

    /**
     * @return array
     * doctor
     * consultation status 0 of today
     */
    public function today()
    {
        return Consultation::where('hospital_id', auth()->user()->hospital->id)->where('date_consultation', date('Y-m-d'))->where('status', 0)->get();
    }

    public function history()
    {
     
        return Consultation::orderByDESC("date_consultation")->where('hospital_id', auth()->user()->hospital->id)->Where('status', 1)->withCount(['ordonnance', 'arret', "examen"])->with("ordonnance", "arret", "examen")->get();
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);

        return $consultation;
    }

    public function detail($id)
    {

        $type = TypeConsultation::findOrFail($id);

        $title = 'Détail ';
        $section = '';
        switch ($type->libelle) {
            case 'Consultation':
                $title .= 'de consultation';
                $section = 'curative';
                break;
            case 'Consultation pré natale':
                $title .= 'de consultation pre natale';
                $section = 'pre-natale';

                break;
            case 'Consultation post natale':
                $title .= 'de consultation post natale';
                $section = 'post-natale';

                break;
            case 'Accouchement':
                $title .= 'd\'accouchement';
                $section = 'accouchement';

                break;
            default:
                $title .= 'de consultation';
                $section = 'curative';
                return [$section, $title];
        }

        return [$section, $title];
    }

}
