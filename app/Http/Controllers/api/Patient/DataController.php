<?php

namespace App\Http\Controllers\api\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientRequest;
use App\Models\Patient;
use App\Models\RendezVous;
use App\Models\SubPrefecture;
use App\Models\User;
use App\Repositories\Patient\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function createRendezVous(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'heure' => 'required|string',
            'motif' => 'required|string',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation échouée',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $patient = Auth::user()->patient;

            // Créer le rendez-vous
            $rendezVous = new RendezVous();
            $rendezVous->title = $request->title;
            $rendezVous->date = $request->date;
            $rendezVous->patient_id = $patient->id;
            $rendezVous->doctor_id = $request->doctor_id;
            $rendezVous->status = 'pending';

            // Gérer l'image si fournie
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/rendez-vous', $imageName);
                $rendezVous->image = $imageName;
            }

            // Sauvegarder les données supplémentaires dans un champ JSON
            $rendezVous->details = json_encode([
                'heure' => $request->heure,
                'motif' => $request->motif,
                'notes' => $request->notes,
                'duree' => $request->duree ?? '30 minutes',
            ]);

            $rendezVous->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Rendez-vous créé avec succès',
                'rendez_vous' => $rendezVous
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erreur lors de la création du rendez-vous: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getDoctors()
{
    try {
        // Jointure entre users et doctors
        $doctors = User::select(
            'users.id',
            'users.name',
            'users.prenom',
            'users.email',
            'doctors.contact as telephone',
            'doctors.img_url as photo',
            'doctors.type_name as specialite',
            'doctors.service_hospital_id'
        )
        ->join('doctors', 'users.id', '=', 'doctors.user_id')
        ->where('users.role_as', 'doctor')
        ->orderBy('users.name')
        ->get()
        ->map(function ($doctor) {
            return [
                'id' => $doctor->id,
                'name' => 'Dr. ' . trim($doctor->name . ' ' . $doctor->prenom),
                'specialite' => $doctor->specialite ?? 'Médecin Généraliste',
                'email' => $doctor->email ?? 'Non spécifié',
                'telephone' => $doctor->telephone ?? 'Non spécifié',
                'photo' => $doctor->photo ? asset('storage/' . $doctor->photo) : null,
                'service_hospital_id' => $doctor->service_hospital_id,
            ];
        });

        return response()->json([
            'status' => 'success',
            'doctors' => $doctors,
            'total' => $doctors->count(),
        ], 200);
    } catch (\Exception $e) {
        Log::error('ERREUR getDoctors: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Erreur serveur'], 500);
    }
}
    public function instance()
    {
        return new PatientRepository();
    }

    public function show()
    {
        return response(['patient' => Patient::where('id', Auth::user()->patient->id)->with('user', 'habitualResidence', 'currentResidence', 'lieuNaissance', 'hospital')->first()], 200);
    }

    public function cities()
    {
        return response(['cities' => SubPrefecture::all()], 200);
    }

    public function update(PatientRequest $request)
    {
        $request->validated();


        $res = $this->instance()->update($request);

        if ($res['status'] == 'error')
            return response()->json(['status' => $res['status'], 'message' => $res['message']], 400);

        return response()->json(['status' => $res['status'], 'message' => $res['message']], 200);
    }

    public function consultations()
    {
        return response(['consultations' => $this->instance()->consultations()], 200);
    }

    public function declarations()
    {
        return response(['declarations' => $this->instance()->declarations()], 200);
    }

 public function rendezVous()
{
    try {
        Log::info('=== DEBUT rendezVous() ===');
        
        $authUser = Auth::user();
        
        if (!$authUser) {
            return response(['error' => 'Non authentifié'], 401);
        }
        
        $patient = $authUser->patient;
        
        if (!$patient) {
            return response(['error' => 'Patient non trouvé'], 404);
        }
        
        $patientId = $patient->id;
        Log::info("Patient ID récupéré: {$patientId}");
        
        // CORRECTION: Enlever 'd.specialite' qui n'existe pas
        $rendezVous = DB::table('rendez_vouses as r')
            ->select(
                'r.id',
                'r.title',
                'r.date',
                'r.heure',
                'r.motif',
                'r.image',
                'r.status',
                'r.details',
                'r.doctor_id',
                'r.created_at',
                'r.updated_at',
                // Infos du médecin depuis users
                'u.name as doctor_name',
                'u.prenom as doctor_prenom',
                'u.email as doctor_email',
                // Infos du médecin depuis doctors
                'd.contact as doctor_telephone',
                'd.img_url as doctor_photo',
                'd.type_name as doctor_type',
                'd.type_doctor_id', // si vous avez besoin
                'd.service_hospital_id' // si vous avez besoin
                // 'd.specialite' n'existe pas - supprimé
            )
            ->leftJoin('users as u', function($join) {
                $join->on('r.doctor_id', '=', 'u.id')
                    ->where('u.role_as', 'doctor');
            })
            ->leftJoin('doctors as d', 'u.id', '=', 'd.user_id')
            ->where('r.patient_id', $patientId)
            // ->where('r.delete', 0) // si vous avez cette colonne
            ->orderBy('r.date', 'desc')
            ->orderBy('r.heure', 'desc')
            ->get()
            ->map(function ($rdv) {
                // Gérer les détails
                $details = [];
                if (is_string($rdv->details)) {
                    $details = json_decode($rdv->details, true) ?? [];
                } elseif (is_array($rdv->details)) {
                    $details = $rdv->details;
                }
                
                // Nom complet du médecin
                $doctorFullName = 'Médecin non spécifié';
                if ($rdv->doctor_name && $rdv->doctor_prenom) {
                    $doctorFullName = 'Dr. ' . trim($rdv->doctor_name . ' ' . $rdv->doctor_prenom);
                } elseif ($rdv->doctor_name) {
                    $doctorFullName = 'Dr. ' . $rdv->doctor_name;
                }
                
                // CORRECTION: Utiliser type_name comme spécialité
                $specialite = $rdv->doctor_type ?? 'Médecin Généraliste';
                
                // Photo
                $photo = $rdv->doctor_photo ? asset('storage/' . $rdv->doctor_photo) : null;
                
                return [
                    'id' => $rdv->id,
                    'title' => $rdv->title,
                    'date' => $rdv->date,
                    'heure' => $rdv->heure ?? ($details['heure'] ?? null),
                    'motif' => $rdv->motif ?? ($details['motif'] ?? 'Non spécifié'),
                    'notes' => $details['notes'] ?? null,
                    'image' => $rdv->image ? asset('storage/' . $rdv->image) : null,
                    'status' => $rdv->status,
                    'doctor_id' => $rdv->doctor_id,
                    'doctor_name' => $doctorFullName,
                    'doctor_specialite' => $specialite,
                    'doctor_photo' => $photo,
                    'doctor_email' => $rdv->doctor_email,
                    'doctor_telephone' => $rdv->doctor_telephone,
                    'doctor_type' => $rdv->doctor_type,
                    'service_hospital_id' => $rdv->service_hospital_id,
                    'created_at' => date('Y-m-d H:i:s', strtotime($rdv->created_at)),
                    'updated_at' => date('Y-m-d H:i:s', strtotime($rdv->updated_at)),
                    'details' => $details,
                ];
            });

        Log::info('Nombre de rendez-vous trouvés: ' . $rendezVous->count());
        Log::info('=== FIN rendezVous() ===');

        return response([
            'success' => true,
            'rdv' => $rendezVous,
            'count' => $rendezVous->count()
        ], 200);
        
    } catch (\Exception $e) {
        Log::error('ERREUR dans rendezVous(): ' . $e->getMessage());
        Log::error('Trace: ' . $e->getTraceAsString());
        
        return response([
            'success' => false,
            'message' => 'Erreur lors de la récupération des rendez-vous',
            'error' => config('app.debug') ? $e->getMessage() : 'Erreur interne'
        ], 500);
    }
}

    public function deleteRendezVous($id)
    {

        $rdv = RendezVous::find($id);
        if ($rdv)
            $rdv->delete();
        else
            return response(['message' => 'Rendez vous introuvable'], 403);

        return response(['message' => 'Rendez vous supprimé'], 200);
    }
}
