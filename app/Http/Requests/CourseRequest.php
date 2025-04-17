<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'course_photo' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories'   => 'required|string',
            'nivel'        => 'required|string'
        ];
    }

    /**
     * Mensagens de Erro Personalizadas
     */

    public function messages(): array
    {
        return [
            'name.required'         => 'O nome do curso é obrigatório.',
            'categories.required'   => 'A categoria do curso é obrigatória.',
            'price.required'        => 'O preço do curso é obrigatório.',
            'price.numeric'         => 'O preço deve ser um número.',
            'description.required'  => 'A descrição do curso é obrigatória.',
            'course_photo.required' => 'A imagem é obrigatória.',
            'course_photo.image'    => 'O arquivo enviado deve ser uma imagem.',
            'course_photo.mimes'    => 'A imagem deve estar no formato: jpeg, png, jpg ou gif.',
            'course_photo.max'      => 'O tamanho máximo permitido para a imagem é 2MB.',
        ];
    }
}
