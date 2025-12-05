<?php

namespace App\Http\Requests\Hospital;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;
class UpdateDoctorRequest extends FormRequest
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
            'name' => "required|string|min:3",
            'password'=> "nullable|string|confirmed|min:4",
            "contact" => "required|regex:/^[0-9]{10}$/",
            "service" => "required|integer|exists:service_hospitals,id",
            "address" => "nullable|string|min:3",
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])],
            "day" =>    "required|array",
            "time" =>
            "required|array",
            "pservice" =>    "required|array",
        ];
    }

}
