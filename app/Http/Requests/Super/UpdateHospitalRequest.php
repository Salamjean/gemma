<?php

namespace App\Http\Requests\Super;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHospitalRequest extends FormRequest
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
            'name'=>"nullable|string|min:3",
            'password'=> "nullable|string|confirmed|min:4",
            'label'=> "nullable|string",
            'district'=> "required|string",
            'direction_generale'=> "nullable|string",
            "contact" => "required|regex:/^[0-9]{10}$/",
            "address" => "required|integer",
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
        ];
    }
}
