<?php

namespace App\Http\Requests\Hospital;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInfirmierRequest extends FormRequest
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
            'name' => "required|string|min:3",
            'password' => "nullable|string|confirmed|min:4",
            "contact" => "required|regex:/^[0-9]{10}$/",
            "address" => "nullable|string|min:3",
            "day" =>    "required|array",
            "time" =>    "required|array",
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ];
    }
}
