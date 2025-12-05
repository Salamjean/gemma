<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\ArretTravail;
use App\Models\BulletinExamen;
use App\Models\Ordonnance;
use App\Repositories\Hospital\ConsultationRepository;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class ConsultationController extends Controller
{
    public function instance()
    {
        return new ConsultationRepository();
    }

    public function today()
    {
        return view('users.hospital.consultation.today', ['consultations' => $this->instance()->today()]);
    }

    public function history()
    {
        return view('users.hospital.consultation.history', ['consultations' => $this->instance()->history()]);
    }

    public function detail($id)
    {
        $consultation = $this->instance()->show($id);
        $data = $this->instance()->detail($consultation->type_consultation_id);
        return view('users.hospital.consultation.detail', ['consultation' => $consultation, 'data' => $data]);
    }

    public function Impression($post, $id)
    {
        if ($post == 'ordonnance')
        $pdf =  Pdf::loadView('users.doctor.consultation.formulaire.post-consultation.pdf.ordonnance', ['ordonnance' => Ordonnance::findOrFail($id)]);
        elseif ($post == 'examen')
        $pdf =  Pdf::loadView('users.doctor.consultation.formulaire.post-consultation.pdf.examen', ['bulletin' => BulletinExamen::findOrFail($id)]);
        elseif ($post == 'arret')
        $pdf =  Pdf::loadView('users.doctor.consultation.formulaire.post-consultation.pdf.arret', ['arret' => ArretTravail::findOrFail($id)]);
        else
            return redirect()->back();

        $pdf->setPaper('A4', 'portrait')->render();

        $response = new Response();
        $response->setContent($pdf->output())->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', "inline; filename=$post$id-" . date('dmY') . ".pdf");

        return $response;
    }
}
