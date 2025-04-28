<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'surname'  => 'required|string|max:255',
            'phone_number' => 'required|numeric',
        ];

        if (empty($this->input('role'))) {
            $rules = [
                'nivel'    => 'required|string|max:255',
                'password' => 'required|confirmed|min:8'
            ];
        }

        if (!empty($this->input('role')) && $this->input('role') == 'instructor') {
            $rules ['specialty']  = 'required|string|max:255';
            $rules ['biography']  = 'required|string';
            $rules ['experience'] = 'required|numeric';
        }

        return $rules;
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
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'surname.required' => 'O sobrenome é obrigatório.',
            'surname.string' => 'O sobrenome deve ser um texto.',
            'surname.max' => 'O sobrenome não pode ter mais de 255 caracteres.',
            'phone_number.required' => 'O número de telefone é obrigatório.',
            'phone_number.numeric' => 'O número de telefone deve conter apenas números.',
            'nivel.required' => 'O nível é obrigatório.',
            'nivel.string' => 'O nível deve ser um texto.',
            'nivel.max' => 'O nível não pode ter mais de 255 caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'specialty.required' => 'A especialidade é obrigatória.',
            'specialty.string' => 'A especialidade deve ser um texto.',
            'specialty.max' => 'A especialidade não pode ter mais de 255 caracteres.',
            'biography.required' => 'A biografia é obrigatória.',
            'biography.string' => 'A biografia deve ser um texto.',
            'experience.required' => 'A experiência é obrigatória.',
            'experience.numeric' => 'A experiência deve ser um número.',
        ];
    }
}
