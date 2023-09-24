<?php

namespace App\Http\Requests\Web\S3;

use Illuminate\Foundation\Http\FormRequest;

class S3Request extends FormRequest
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
            'file' => 'required|file',
            'path' => 'string|min:1|max:255',
            'name' => 'required|string|min:1|max:255',
        ];
    }
}
