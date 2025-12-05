<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OneSignalToken;
use App\Models\Patient;
use App\Models\User;
use App\Repositories\SmsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private static $ind = "225";
    //login
    public function login(Request $request)
    {

        $request->validate([
            'code' => 'required',
        ]);

        $patient = Patient::where('code_patient', $request->code)->with('user')->first();

        if (!$patient) {
            $patientT = Patient::where('telephone', $request->code)->with('user')->first();
            if (!$patientT) {
                return response([
                    'message' => 'Vous n\'etes pas patient!'
                ], 403);
            }
            $patient = $patientT;
        }

        $user = User::where('id', $patient->user->id)->where('role_as', 'patient')->first();

        if (!$user)
            return response(['message' => 'Utilisateur introuvable!'], 403);

        if (!$patient->telephone)
            return response(['message' => 'Prière d\'aller dans un etablessement de santé avec votre code patient pour l\'ajout de votre numéro de téléphone!'], 403);

        $code = 1234;
        $password = "$code";

        $message = "Bonjour M/Mme $user->name $user->prenom, veuillez utiliser le code ci-dessous pour vous connecter.\nCode : $code";
        (new SmsRepository($patient->telephone, $message))->send();

        $user->update(['password' => bcrypt($password)]);

        return response([
            'password' => $password,
        ], 200);
    }

    public function confirmLogin(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'password' => 'required',
        ]);

        // verif patient
        $patient = Patient::where('code_patient', $request->code)->with('user')->first();

        if (!$patient) {
            $patientT = Patient::where('telephone', $request->code)->with('user')->first();
            if (!$patientT) {
                return response([
                    'message' => 'Vous n\'etes pas patient!'
                ], 403);
            }
            $patient = $patientT;
        }

        $user = User::where('id', $patient->user->id)->where('role_as', 'patient')->first();

        //if user return 403
        if (!$user) {
            return response([
                'message' => 'Vous n\'etes pas patient!'
            ], 403);
        }

        $attrs['id'] = $user->id;
        $attrs['password'] = $request->password;

        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Code OTP incorret!'
            ], 403);
        }

        return response()->json([
            'patient' => Patient::where('id', Auth::user()->patient->id)->with('user')->first(),
            'token' => auth()->user()->createToken('secret')->plainTextToken,
        ], 200);
    }

    public function logout()
    {
        OneSignalToken::firstWhere('patient_id', auth()->user()->patient->id)->delete();
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'deconnexion...',
        ], 200);
    }
}
