<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Declaration;
use App\Repositories\Hospital\DeclarationRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;


class DeclarationController extends Controller
{
    protected  $title;

    public function __construct($title = 'Déclaration -')
    {
        $this->title = $title;
    }

    public function instance()
    {
        return new DeclarationRepository();
    }

    public function listNaissance()
    {
        return view('users.hospital.declaration.naissance.list', ['declarations' => $this->instance()->indexNaissance()]);
    }

    public function showNaissance($id)
    {
        return view('users.hospital.declaration.naissance.show', ['declaration' => $this->instance()->showNaissance($id)]);
    }

    public function listDeces()
    {
        return view('users.hospital.declaration.deces.list', ['declarations' => $this->instance()->indexDeces()]);
    }

    public function showDeces($id)
    {
        return view('users.hospital.declaration.deces.show', ['declaration' => $this->instance()->showDeces($id)]);
    }

    //doc pdf
    public function certificatNaissance($id)
    {
        $declaration = Declaration::findOrFail($id);


        $pdf =  Pdf::loadView('users.doctor.declaration.pdf.naissance', ['declaration' => $declaration]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="certificat_medical_naissance.pdf"');

        return $response;
    }

    public function certificatDeces($id)
    {
        $declaration = Declaration::findOrFail($id);


        $pdf =  Pdf::loadView('users.doctor.declaration.pdf.deces', ['declaration' => $declaration]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="certificat_medical_deces.pdf"');

        return $response;
    }
}
