<?php

namespace App\Http\Requests\Web\Cosplays;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CosplayUpdateRequest extends FormRequest
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
        $id = $this->cosplay ?? $this->id;
        
        return [
            'image_path' => [
                'string',
                Rule::unique('cosplays', 'image_path')->ignore($id),
            ],
            'autor_name' => 'string',
            'pinture_name' => 'string',
            'description' => 'string',
            'class_name' => 'string',
        ];
    }
}
