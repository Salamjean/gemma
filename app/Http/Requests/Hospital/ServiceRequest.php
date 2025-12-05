<?php

namespace App\Http\Requests\Hospital;

use App\Rules\FileTypeValidate;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'department' => 'required',
            'service' => 'required|array',
            'prix' => 'required|array',
            'description' => 'nullable|array',
        ];
    }
}
