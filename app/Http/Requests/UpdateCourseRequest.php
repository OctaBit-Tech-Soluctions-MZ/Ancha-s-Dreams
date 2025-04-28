<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'price' => 'required|numeric',
            'description' => 'required|string',
            'course_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories'   => 'required|string',
        ];
    }

    /**
     * Mensagens de Erro Personalizadas
     */

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'price.required' => 'O preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um número.',
            'description.required' => 'A descrição é obrigatória.',
            'description.string' => 'A descrição deve ser um texto.',
            'course_photo.image' => 'O arquivo da foto do curso deve ser uma imagem.',
            'course_photo.mimes' => 'A foto do curso deve ser do tipo: jpeg, png, jpg ou gif.',
            'course_photo.max' => 'A foto do curso não pode ter mais de 2MB.',
            'categories.required' => 'A categoria é obrigatória.',
            'categories.string' => 'A categoria deve ser um texto.',
            'nivel.required' => 'O nível é obrigatório.',
            'nivel.string' => 'O nível deve ser um texto.',
        ];
    }
}
