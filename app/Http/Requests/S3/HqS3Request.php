<?php

namespace App\Http\Requests\S3;

use Illuminate\Foundation\Http\FormRequest;

class HqS3Request extends FormRequest
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
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'path' => 'string',
        ];
    }
}
