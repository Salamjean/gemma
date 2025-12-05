<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeclarationDeathRequest extends FormRequest
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
            "deceased_personne_fullname" => "required|string|min:3",
            'idcard_no'  => "nullable|string|min:8|unique:declarations",
            "birth_date" => "required|date",
            "death_date" => "required|date",
            "death_time" => "required",
            "age_of_deceased" => "nullable|integer",
            "sex_of_deceased" => "required|string|min:1",
            "circumstance_of_death" => "nullable|string|min:3"
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
            "deceased_personne_fullname.required" => "Le nom de la personne est requis.",
            "deceased_personne_fullname.string" => "Le nom de la personne doit être une chaîne de caractères.",
            'idcard_no.string' => 'Le numéro de pièce d\'identité doit être une chaîne de caractères.',
            'idcard_no.min' => 'Le numéro de pièce d\'identité doit avoir au moins 8 caractères.',
            'idcard_no.unique' => 'Le numéro de pièce d\'identité est déjà utilisé.',
            "birth_date.required" => "La date de naissance est requis.",
            "birth_date.date" => "La date de naissance doit être une date valide.",
            "death_date.required" => "La date de décès est requise.",
            "death_date.date" => "La date de décès doit être une date valide.",
            "birth_time.required" => "L'heure de décès est requise.",
            "age_of_deceased.integer"    => "L'âge doit etre de type entier",
            "sex_of_deceased.required" => "Le sexe de la personne est requis.",
            "sex_of_deceased.string" => "Le sexe de la personne doit être une chaîne de caractères.",
            "sex_of_deceased.min" => "Le sexe de la personne doit contenir au moins 1 caractère.",
            "circumstance_of_death.string" => "La circonstance du décès  doit être une chaîne de caractères.",
            "circumstance_of_death.min" => "La circonstance du décès doit contenir au moins 3 caractère.",
        ];
    }
}
