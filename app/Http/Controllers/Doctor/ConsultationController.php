<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\ConsultationPostNataleRequest;
use App\Http\Requests\Doctor\ConsultationPreNataleRequest;
use App\Http\Requests\Doctor\ConsultationAccouchementRequest;
use App\Models\Consultation;
use App\Models\Drug;
use App\Models\DrugHospital;
use App\Models\Ordonnance;
use App\Models\Registre;
use App\Models\RegistreConsultationCurative;
use App\Repositories\Doctor\ConsultationRepository;
use App\Repositories\Doctor\IssueRepository;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{

    public function instance()
    {
        return new ConsultationRepository();
    }

    public function instanceIssue()
    {
        return new IssueRepository();
    }

    public function today()
    {
        return view('users.doctor.consultation.today', ['consultations' => $this->instance()->today()]);
    }

    public function history()
    {
        return view('users.doctor.consultation.history', ['consultations' => $this->instance()->history()]);
    }

    //form generate
    public function formulaire($id)
    {

        $consultation = $this->instance()->show($id);

        $data = $this->instance()->formulaireMotif($consultation->prestationHospital->prestation_service_id);
        return view('users.doctor.consultation.formulaire', ['title' => $data[1], 'consultation' => $consultation, 'type' => $data[0]]);
    }

    public function formulaireIssue($title, $mode_sortie, $consultation)
    {
        $title = $this->instanceIssue()->formulaireIssue($mode_sortie);
        $drugsHospital = DrugHospital::where('hospital_id', auth()->user()->doctor->hospital_id)->get();
        $drugs = Drug::all();
        return view('users.doctor.consultation.formulaire.formulaire_issue', ['type' => $mode_sortie, 'title' => $title, 'drugsHospital' => $drugsHospital, 'drugs' => $drugs, 'consultation' => $this->instance()->show($consultation)]);
    }

    public function formulairePostConsultation($title, $mode_sortie, $consultation)
    {
        $title = $this->instanceIssue()->formulaireIssue($mode_sortie);
        return view('users.doctor.consultation.formulaire.formulaire_post_consultation', ['type' => $mode_sortie, 'title' => $title, 'consultation' => $this->instance()->show($consultation)]);
    }

    //store form

    public function storePostNatale(ConsultationPostNataleRequest $request)
    {
        // dd($request->mode_sortie);
        $request->validated();

        $res = $this->instance()->storePostNatales($request);

        if ($res['status'] == 'error')
            return redirect()->back()->withErrors($res['message']);

        if ($request->mode_sortie) {

            $title = $this->instanceIssue()->formulaireIssue($request->mode_sortie);
            return redirect()->route('doctor.consultation.formulaire.issue', [$title, $request->mode_sortie, Consultation::find($request->consultation_id)])->with('success', $res['message']);
        }

        return redirect()->route('doctor.consultation.today')->with('success', $res['message']);
    }

    public function storePreNatale(ConsultationPreNataleRequest $request)
    {

        $request->validated();

        $res = $this->instance()->storePreNatales($request);

        if ($res['status'] == 'error')
            return redirect()->back()->withErrors($res['message']);

        if ($request->mode_sortie) {
            $title = $this->instanceIssue()->formulaireIssue($request->mode_sortie);
            return redirect()->route('doctor.consultation.formulaire.issue', [$title, $request->mode_sortie, $request->consultation_id])->with('success', $res['message']);
        }

        return redirect()->route('doctor.consultation.today')->with('success', $res['message']);
    }

    public function storeAccouchement(ConsultationAccouchementRequest $request)
    {

        $request->validated();

        //dd($request);

        $res = $this->instance()->storeAccouchements($request);

        if ($res['status'] == 'error')
            return redirect()->back()->withErrors($res['message']);

        if ($request->mode_sortie) {
            $title = $this->instanceIssue()->formulaireIssue($request->mode_sortie);
            return redirect()->route('doctor.consultation.formulaire.issue', [$title, $request->mode_sortie, $request->consultation_id])->with('success', $res['message']);
        }

        return redirect()->route('doctor.consultation.today')->with('success', $res['message']);
    }

    public function storeConsultationCurative(Request $request)
    {
        $request->validate([
            'mode_sortie' => 'required',
            'motif_consultation' => 'required',
        ]);


        if (Registre::where('consultation_id', $request->consultation_id)->exists()) {
            $registre = Registre::where('consultation_id', $request->consultation_id)->first();

            $registre->issue_consultation = $request->mode_sortie;
            $registre->save();

            RegistreConsultationCurative::where('registre_id', $registre->id)
                ->update([
                    "mode_entree" => $request->mode_entree,
                    //"type_population" => $request->type_population,
                    "motif_consultation" => $request->motif_consultation,
                    "en_cours_de_scolarisation" => $request->en_cours_de_scolarisation,
                    "tdr_paludisme" => $request->tdr_paludisme,
                    "goutte_epaise" => $request->goutte_epaise,
                    "milda_enfant_eligible" => $request->milda_enfant_eligible,
                    "remise_milda_enfant" => $request->remise_milda_enfant,
                    "cdip_propose" => $request->cdip_propose,
                    "cdip_realise" => $request->cdip_realise,
                    "code_depistage_client" => $request->code_depistage_client,
                    "glycemie_a_jeun" => $request->glycemie_a_jeun,
                    "glycemie_non_a_jeun" => $request->glycemie_non_a_jeun,
                    "zcore" => $request->zscore,
                    "temperature" => $request->temperature,
                    "frequence_respiratoire" => $request->frequence_respiratoire,
                    "ta" => $request->ta,
                    "hta" => $request->hta,
                    "pouls" => $request->pouls,
                    "perimetre_brachial" => $request->perimetre_brachial,
                    "perimetre_cranien" => $request->perimetre_cranien,
                    "tuberculose" => $request->tuberculose,
                    "traitement_medicamenteux" => $request->traitement_medicamenteux,
                    "antecedent_medical" => $request->antecedent_medical,
                    "antecedent_chirurgical" => $request->antecedent_chirurgical,
                    "gyneco_obstetrico" => $request->gyneco_obstetrico,
                    "ddr" => $request->ddr,
                    "en_cours_de_grossesse" => $request->en_cours_de_grossesse,
                    "description_grossesse" => $request->description_grossesse,
                    "mode_de_vie" => $request->mode_de_vie,
                    "tabac" => $request->tabac,
                    "alcool" => $request->alcool,
                    "taille" => $request->taille,
                    "poids" => $request->poids,
                    "traitement_medicamenteux" => $request->traitement_medicamenteux,
                    "imc" => $request->imc,
                    "drepanocytaire" => $request->drepanocytaire,
                    "saturation_oxygene" => $request->saturation_oxygene,
                    "type_visite" => $request->type_visite,
                    "examen_physique" => $request->examen_physique,
                    "diagnostic_retenu" => $request->diagnostic_retenu,
                    "autre_pathologie_associee" => $request->autre_pathologie_associee,
                    "autre_antecedent_medical" => $request->autre_antecedent_medical,
                    "autre_antecedent_chirurgical" => $request->autre_antecedent_chirurgical,
                    "nom_operation" => $request->nom_operation,

                ]);
        } else {
            //consultation
            $consultation = Consultation::findOrFail($request->consultation_id);

            $registre = Registre::create([
                "code" => codeRegistre($consultation->patient->code_patient, $consultation->patient->id),
                "type_consultation" => "consultation curative",
                "consultation_id" => $request->consultation_id,
                "issue_consultation" => $request->mode_sortie,
            ]);

            $consultationcurative = RegistreConsultationCurative::create([
                "registre_id" => $registre->id,
                "mode_entree" => $request->mode_entree,
                //"type_population" => $request->type_population,
                "motif_consultation" => $request->motif_consultation,
                "en_cours_de_scolarisation" => $request->en_cours_de_scolarisation,
                "tdr_paludisme" => $request->tdr_paludisme,
                "goutte_epaise" => $request->goutte_epaise,
                "milda_enfant_eligible" => $request->milda_enfant_eligible,
                "remise_milda_enfant" => $request->remise_milda_enfant,
                "cdip_propose" => $request->cdip_propose,
                "cdip_realise" => $request->cdip_realise,
                "code_depistage_client" => $request->code_depistage_client,
                "glycemie_a_jeun" => $request->glycemie_a_jeun,
                "glycemie_non_a_jeun" => $request->glycemie_non_a_jeun,
                "zcore" => $request->zscore,
                "temperature" => $request->temperature,
                "frequence_respiratoire" => $request->frequence_respiratoire,
                "ta" => $request->ta,
                "hta" => $request->hta,
                "pouls" => $request->pouls,
                "perimetre_brachial" => $request->perimetre_brachial,
                "perimetre_cranien" => $request->perimetre_cranien,
                "tuberculose" => $request->tuberculose,
                "traitement_medicamenteux" => $request->traitement_medicamenteux,
                "antecedent_medical" => $request->antecedent_medical,
                "antecedent_chirurgical" => $request->antecedent_chirurgical,
                "gyneco_obstetrico" => $request->gyneco_obstetrico,
                "ddr" => $request->ddr,
                "en_cours_de_grossesse" => $request->en_cours_de_grossesse,
                "description_grossesse" => $request->description_grossesse,
                "mode_de_vie" => $request->mode_de_vie,
                "tabac" => $request->tabac,
                "alcool" => $request->alcool,
                "taille" => $request->taille,
                "poids" => $request->poids,
                "traitement_medicamenteux" => $request->traitement_medicamenteux,
                "imc" => $request->imc,
                "drepanocytaire" => $request->drepanocytaire,
                "saturation_oxygene" => $request->saturation_oxygene,
                "type_visite" => $request->type_visite,
                "examen_physique" => $request->examen_physique,
                "diagnostic_retenu" => $request->diagnostic_retenu,
                "autre_pathologie_associee" => $request->autre_pathologie_associee,
                "autre_antecedent_medical" => $request->autre_antecedent_medical,
                "autre_antecedent_chirurgical" => $request->autre_antecedent_chirurgical,
                "nom_operation" => $request->nom_operation,

            ]);

            if ($consultationcurative) {

                $consultation = Consultation::where('id', $request->consultation_id)->findOrFail($request->consultation_id);
                $consultation->status = 1;
                $consultation->save();
            }
        }


        if ($request->mode_sortie) {

            $title = $this->instanceIssue()->formulaireIssue($request->mode_sortie);
            return redirect()->route('doctor.consultation.formulaire.issue', [$title, $request->mode_sortie, Consultation::find($request->consultation_id)])->with('success', 'Consultation éffectuée avec succès !');
        }

        return redirect()->route('doctor.consultation.today')->with('success', 'Consultation effectuée avec succès !');
    }



    public function detailconsulation($id)
    {
        $consultation = Consultation::findOrFail($id);
        $ordonnance = Ordonnance::where('consultation_id', $consultation->id)->first();
        return view('users.doctor.consultation.detail', compact('consultation', 'ordonnance'));
    }

    public function detail($id)
    {
        $consultation = Consultation::findOrFail($id);
        $ordonnance = Ordonnance::where('consultation_id', $consultation->id)->first();
        return view('users.doctor.consultation.detail', compact('consultation', 'ordonnance'));
    }
    public function infoPatient($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('users.doctor.consultation.info', compact('consultation'));
    }

    public function patientCard(Request $request, $id)
    {
        $patient = \App\Models\Patient::with(['user', 'hospital'])->findOrFail($id);
        if ($request->ajax()) {
            return view('users.secretariat.patient.card_inner', compact('patient'));
        }
        return view('users.secretariat.patient.card', compact('patient'));
    }
}
