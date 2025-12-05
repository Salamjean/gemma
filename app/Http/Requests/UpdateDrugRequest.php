<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDrugRequest extends FormRequest
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
        return
        [
            "quantity" => ['required', 'numeric'],
            "price" => ['required', 'numeric'],
        ];
    }

    // public function messages(): array
    // {
    //     return
    //     [
    //         "drug_code.required" => "Le code du médicament est obligatoire.",
    //         "drug_code.string" => "Le code du médicament doit être une chaîne de caractères.",
    //         "drug_code.unique" => "Le code du médicament doit être unique.",
    //         "designation.required" => "La désignation est obligatoire.",
    //         "designation.string" => "La désignation doit être une chaîne de caractères.",
    //         "quantity.required" => "La quantité est obligatoire.",
    //         "quantity.numeric" => "La quantité doit être un nombre.",
    //         "unit_price.required" => "Le prix est obligatoire.",
    //         "unit_price.numeric" => "Le prix doit être un nombre."
    //     ];
    // }
}
