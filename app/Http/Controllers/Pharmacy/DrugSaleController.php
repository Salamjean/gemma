<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\CareRequested;
use App\Models\DrugSale;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class DrugSaleController extends Controller
{


    public function pending()
    {
        $hospitalId = Auth::user()->pharmacy->hospital_id;
        $payments = DrugSale::whereDate('created_at', date('Y-m-d'))->with('careRequested.admission.patient.user', 'hospitalisationDrugRequested')->where('status', 'pending')
            ->where('hospital_id', $hospitalId)
            ->get();

        return view('users.pharmacist.sale.pending', compact('payments'));
    }

    public function history()
    {
        $hospitalId = Auth::user()->pharmacy->hospital_id;
        $payments = DrugSale::whereDate('created_at','<', date('Y-m-d'))->orWhere('status', 'success')->with('careRequested')
            ->where('hospital_id', $hospitalId)
            ->get();

        return view('users.pharmacist.sale.history', compact('payments'));
    }

    public function indicate()
    {

        $payments = DrugSale::where('pharmacy_id', Auth::user()->pharmacy->id)->whereDate('created_at', date('Y-m-d'))->get();
        $phamarcy = Auth::user()->pharmacy;

        $pdf =  Pdf::loadView('users.pharmacist.indicate', ['payments' => $payments, 'pharmacy' => $phamarcy]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="payment_of_' . date('d-m-Y') . '.pdf"');

        return $response;
    }

    public function show($id){

        $payment = DrugSale::findOrFail($id);

        return view('users.pharmacist.sale.show', compact('payment'));
    }

    public function detail($id)
    {

        $payment = DrugSale::findOrFail($id);

        return view('users.pharmacist.sale.detail', compact('payment'));
    }

    public function pay($id)
    {
        try {

            $payment = DrugSale::findOrFail($id);

            if($payment->type == 'care_requested')
                $care = CareRequested::findOrFail($payment->care_requested_id);

            if($payment->status == 'success')
                return back()->with('error', 'Paiement déja effectuer.');

            $payment -> status = 'success';
            $payment -> pharmacy_id =  Auth::user()->pharmacy->id;
            $payment -> save();

            if ($payment->type == 'care_requested'){
                $care -> status = 'payment_success';
                $care -> save();
            }

            return redirect()->route('dashboard')->with('success', 'Paiement effectué avec succès.');

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function payImpression($id)
    {

        $payment = DrugSale::findOrFail($id);
        $phamarcy = Auth::user()->pharmacy;

        $pdf =  Pdf::loadView('users.pharmacist.pdf.pay', ['payment' => $payment, 'pharmacy' => $phamarcy]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $response = new Response();
        $response->setContent($pdf->output());
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="payment_of_' . date('d-m-Y') . '.pdf"');

        return $response;
    }

}
