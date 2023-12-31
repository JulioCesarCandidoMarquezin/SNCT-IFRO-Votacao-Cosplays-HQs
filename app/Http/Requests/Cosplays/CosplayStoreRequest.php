<?php

namespace App\Http\Requests\Cosplays;

use Illuminate\Foundation\Http\FormRequest;

class CosplayStoreRequest extends FormRequest
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
            'autor_name' => 'required|string|min:1|max:255',
            'class_name' => 'required|string|min:1|max:255',
            'pinture_name' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:2048',
            'cosplay_path' => 'string|min:1|max:255',
            'pinture_path' => 'string|min:1|max:255',
        ];
    }

}
