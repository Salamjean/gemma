<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            //
            'name'=>"required|string|min:3",
            'email'=> "required|email",
            "gender" => "required|string|min:5",
            "contact" => "required|regex:/^[0-9]{10}$/",
            "address" => "nullable|string|min:3",
            "img_url" => "nullable|image|mimes:jpg,jpeg,png",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.min' => 'Le nom doit comporter au moins 3 caractères.',
            'email.required' => 'L\'adresse email est requise.',
            'email.email' => 'L\'adresse email doit être une adresse email valide.',
            'gender.required' => 'Le genre est requis.',
            'gender.string' => 'Le genre doit être une chaîne de caractères.',
            'gender.min' => 'Le genre doit comporter au moins 5 caractères.',
            'contact.required' => 'Le contact est requis.',
            'contact.regex' => 'Le numéro de téléphone doit contenir exactement 10 chiffres sans lettres ni symboles.',
            'address.string' => 'L\'adresse doit être une chaîne de caractères.',
            'address.min' => 'L\'adresse doit comporter au moins 3 caractères.',
            'img_url.image' => 'Le fichier doit être une image.',
            'img_url.mimes' => 'Le fichier doit être au format jpg,jpeg ou png',
            'img_url.uploaded'=> "Taille de l'image choisie trop grande, veuillez choisir une autre image (poids <= 2mo).",
        ];
    }
}
