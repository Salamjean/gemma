<?php

namespace App\Http\Requests;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [

            'password'=> "nullable|string|confirmed|min:4",
            "contact" => "nulaable|regex:/^[0-9]{10}$/",
            "address" => "nullable|string|min:3",
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ];
    }
}
