<?php

namespace App\Http\Requests\Patient;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PatientRequest extends FormRequest
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
            'residence_actuelle' => 'nullable|integer',
            'residence_habituelle' => 'nullable|integer',
            'profession' => 'nullable|string|min:3',
            'situation_matrimoniale' => 'nullable',
            'contact1' => 'nullable|min:10|max:10',
            'contact2' => 'nullable|min:10|max:10',
            'nom_persn_sos' => 'nullable',
            'tel_persn_sos' => 'nullable',
            'lien_persn_sos' => 'nullable',
            'nom_persn_sos2' => 'nullable',
            'tel_persn_sos2' => 'nullable',
            'lien_persn_sos2' => 'nullable',
            'adresse' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . ($this->user() ? $this->user()->id : 'NULL'),
            'password' => 'nullable|string|confirmed|min:4',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],


        ];
    }
}
