<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image_url' => 'required|url',
            'project_url' => 'required|url',
            'description' => 'required|string|max:200',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 255 characters.',
            'subtitle.required' => 'The subtitle field is required.',
            'subtitle.max' => 'The subtitle field must not exceed 255 characters.',
            'image_url.required' => 'The image URL field is required.',
            'image_url.url' => 'The image URL must be a valid URL.',
            'project_url.required' => 'The project URL field is required.',
            'project_url.url' => 'The project URL must be a valid URL.',
            'description.required' => 'The description field is required.',
            'description.max' => 'The description must not exceed 200 characters.',
        ];
    }
}
