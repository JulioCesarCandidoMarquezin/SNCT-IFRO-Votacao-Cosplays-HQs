<?php

namespace App\Http\Requests\Web\Cosplays;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CosplayUpdateRequest extends FormRequest
{
    /**a
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
            'autor_name' => 'required|string|min:1|max:255',
            'class_name' => 'required|string|min:1|max:255',
            'pinture_name' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1|max:2048',
            'cosplay_path' => [
                'required|string|min:1|max:255',
                Rule::unique('cosplays', 'cosplay_path')->ignore($id),
            ],
            'pinture_path' => 'required|string|min:1|max:255',
        ];
    }
}
