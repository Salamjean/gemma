<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FingerprintService
{
    private $scanner;
    private $deviceModel;

    public function __construct()
    {
        // Configuration selon votre scanner (ex: DigitalPersona, Futronic, etc.)
        $this->deviceModel = config('fingerprint.device', 'DigitalPersona U.are.U 4500');
        $this->initializeScanner();
    }

    private function initializeScanner()
    {
        // Initialisation du scanner selon le modèle
        // Cette partie dépend de votre scanner spécifique
        // Exemple avec SDK DigitalPersona
        try {
            // Code d'initialisation du scanner
            // $this->scanner = new ScannerSDK();
            Log::info('Scanner d\'empreintes initialisé: ' . $this->deviceModel);
        } catch (\Exception $e) {
            Log::error('Erreur initialisation scanner: ' . $e->getMessage());
        }
    }

    public function captureFingerprint($finger = 'right_index')
    {
        try {
            // Capture d'empreinte selon le doigt spécifié
            $result = [
                'template' => $this->captureTemplate(),
                'image' => $this->captureImage(),
                'quality' => $this->getQualityScore(),
                'timestamp' => now()
            ];

            return $result;
        } catch (\Exception $e) {
            Log::error('Erreur capture empreinte: ' . $e->getMessage());
            return null;
        }
    }

    public function verifyFingerprint($patient, $fingerprintTemplate)
    {
        // Vérification 1:1
        $storedTemplate = $patient->fingerprint_left_index ?? $patient->fingerprint_right_index;
        
        if (!$storedTemplate) {
            return false;
        }

        // Logique de comparaison selon votre SDK
        $matchScore = $this->compareTemplates($storedTemplate, $fingerprintTemplate);
        
        return $matchScore > config('fingerprint.threshold', 80);
    }

    public function identifyPatient($fingerprintTemplate)
    {
        // Identification 1:N
        $patients = Patient::whereNotNull('fingerprint_left_index')
            ->orWhereNotNull('fingerprint_right_index')
            ->get();

        foreach ($patients as $patient) {
            if ($this->verifyFingerprint($patient, $fingerprintTemplate)) {
                return $patient;
            }
        }

        return null;
    }

    private function captureTemplate()
    {
        // Capture template selon votre SDK
        // Exemple avec Web API
        return base64_encode("SIMULATED_TEMPLATE_" . uniqid());
    }

    private function captureImage()
    {
        // Capture image base64
        return base64_encode("SIMULATED_IMAGE_" . uniqid());
    }

    private function getQualityScore()
    {
        // Score de qualité (0-100)
        return rand(80, 100);
    }

    private function compareTemplates($template1, $template2)
    {
        // Logique de comparaison
        // À adapter selon votre SDK
        return rand(0, 100);
    }
}