<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'description' => 'required',
            'author' => 'required|string|max:255',
            'book_photo' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'book' => 'required|nullable|file|mimes:pdf|max:153600'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'author.required' => 'O autor é obrigatório.',
            'author.string' => 'O autor deve ser um texto.',
            'author.max' => 'O autor não pode ter mais de 255 caracteres.',
            'book_photo.required' => 'A foto do livro é obrigatória.',
            'book_photo.image' => 'A foto do livro deve ser uma imagem.',
            'book_photo.mimes' => 'A foto do livro deve ser do tipo: jpeg, png, jpg, gif ou webp.',
            'book_photo.max' => 'A foto do livro não pode ter mais de 2MB.',
            'book.required' => 'O arquivo do livro é obrigatório.',
            'book.file' => 'O arquivo do livro deve ser um arquivo.',
            'book.mimes' => 'O livro deve ser do tipo: pdf.',
            'book.max' => 'O arquivo do livro não pode ter mais de 150MB.',
        ];
    }
}
