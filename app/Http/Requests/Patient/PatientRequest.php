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
            'residence_actuelle' => ' required|integer',
            'residence_habituelle' => 'required|integer',
            'profession' => 'required|string|min:3',
            'situation_matrimoniale' => 'required',
            'contact1' => 'required|min:10|max:10',
            'contact2' => 'nullable|min:10|max:10',
            'nom_persn_sos' => 'required',
            'tel_persn_sos' => 'required',
            'lien_persn_sos' => 'required',
            'nom_persn_sos2' => 'nullable',
            'tel_persn_sos2' => 'nullable',
            'lien_persn_sos2' => 'nullable',
            'adresse' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'password' => 'nullable|string|confirmed|min:4',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],


        ];
    }
}
