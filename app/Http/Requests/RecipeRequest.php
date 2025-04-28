<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'preparation_method' => 'required',
            'preparation_time' => 'required|numeric',
            'time' => 'required',
            'rendimento' => 'required|numeric',
            'categories' => 'required|string|max:255',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'preparation_method.required' => 'O modo de preparação é obrigatório.',
            'preparation_time.required' => 'O tempo de preparação é obrigatório.',
            'preparation_time.numeric' => 'O tempo de preparação deve ser um número.',
            'time.required' => 'O tempo é obrigatório.',
            'rendimento.required' => 'O rendimento é obrigatório.',
            'rendimento.numeric' => 'O rendimento deve ser um número.',
            'categories.required' => 'A categoria é obrigatória.',
            'categories.string' => 'A categoria deve ser um texto.',
            'categories.max' => 'A categoria não pode ter mais de 255 caracteres.',
            'image.required' => 'A imagem é obrigatória.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou webp.',
            'image.max' => 'A imagem não pode ter mais de 2MB.',
        ];
        
    }
}
