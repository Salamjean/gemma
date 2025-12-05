<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DeclarationNaissanceRequest extends FormRequest
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

            'consultation_id' => 'nullable|integer',
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date_format:d/m/Y',
            'nee1' => 'required|string',
            'heure1' => 'required|date_format:H:i',
            'lieu' => 'required|string',
            'genre1' => 'required|string',
            'observation' => 'nullable|string',
        ];
    }
}
