<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeDeclarationRequest extends FormRequest
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
            'label'=>"required|string|min:3|unique:type_declarations,label",
            "description" => "nullable|string|min:3",
        ];
    }
    public function messages()
    {
        return [
            'label.required' => "Le libellé du Type de déclaration est obligatoire.",
            'label.string' => "Le libellé du Type de déclaration doit être une chaîne de caractères.",
            'label.min' => "Le libellé du Type de déclaration doit comporter au moins 03 caractères.",
            'label.unique' => "Ce libellé du Type de déclaration existe déjà dans notre système.",
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.min' => 'La description doit comporter au moins 03 caractères.',
        ];
    }
}
