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
        Rule::unique('cosplays')->ignore($id);
        $rules = [
            'image_path' => 'string|unique:cosplays,image_path,' . $this->image_path,
            'autor_name' => 'string',
            'original_pinture_name' => 'string',
            'description' => 'string',
            'class_name' => 'string',
        ];

        return $rules;
    }
}
