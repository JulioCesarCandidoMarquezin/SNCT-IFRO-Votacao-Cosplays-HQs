<?php

namespace App\Http\Requests\HQs;

use Illuminate\Foundation\Http\FormRequest;

class HQStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'autor_name' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'tags' => 'required|array',  
            'tags.*' => 'string|max:255', 
            'description' => 'required|string',
            'image_path' => 'required|string|max:255',
        ];
    }

}
