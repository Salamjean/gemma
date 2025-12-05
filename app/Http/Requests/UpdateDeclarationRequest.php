<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeclarationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "town_id" => "nullable|integer|exists:towns,id",
            "mother_fullname" => "required|string|min:3",
            'idcard_no'  => "required|string|min:8",
            "mother_contact" => "required|regex:/^[0-9]{10}$/",
            "birth_date" => "required|date",
            "birth_time" => "required",
            "child_sex" => "required|string|min:1",
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'town_id.integer' => 'L\identifiant de la commune doit être un entier.',
            'town_id.exists' => 'La commune sélectionnée n\'existe pas.',
            "mother_fullname.required" => "Le nom de la mère est requis.",
            "mother_fullname.string" => "Le nom de la mère doit être une chaîne de caractères.",
            'idcard_no.required' => 'Le numéro de pièce d\'identité est obligatoire.',
            'idcard_no.string' => 'Le numéro de pièce d\'identité doit être une chaîne de caractères.',
            'idcard_no.min' => 'Le numéro de pièce d\'identité doit avoir au moins 8 caractères.',
            'mother_contact.required' => 'Le contact est requis.',
            'mother_contact.regex' => 'Le numéro de téléphone doit contenir exactement 10 chiffres sans lettres ni symboles.',
            "notebook_number.required" => "Le N° de carnet est requis.",
            "notebook_number.string" => "Le N° de carnet doit être une chaîne de caractères.",
            "notebook_number.unique" => "Le N° de carnet spécifié est déjà utilisé pour une autre déclaration de naissance.",
            "birth_date.required" => "La date de naissance est requis.",
            "birth_date.date" => "La date de naissance doit être une date valide.",
            "birth_time.required" => "L' heure de naissance est requis.",
            "child_sex.required" => "Le sexe de l'enfant est requis.",
            "child_sex.string" => "Le sexe de l'enfant doit être une chaîne de caractères.",
            "child_sex.min" => "Le sexe de l'enfant doit contenir au moins 1 caractère.",
        ];
    }
}
