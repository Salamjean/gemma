<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DeclarationDecesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'consultation_id' => 'nullable|integer',
            'date' => 'required|date_format:d/m/Y',
            'milieu_residence' => 'required|string',
            'heure' => 'required|date_format:H:i',
            'lieu' => 'required|string',
            'genre' => 'nullable|string',
            'nombre' => 'required|integer',
            'cause_initiale' => 'required|string',
            'cause_directe' => 'required|string',
            'deces_maternel' => 'required|string',
            'observation' => 'nullable|string',

        ];
    }
}
