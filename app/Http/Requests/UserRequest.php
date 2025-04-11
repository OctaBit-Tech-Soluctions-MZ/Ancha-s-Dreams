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
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ];
    }

    /**
     * Mensagens de Erro Personalizadas
     */

    public function messages(): array
    {
        return [
            'name.required'         => 'O nome completo do utilizador é obrigatório.',
            'email.required'        => 'O email é obrigatório.',
            'email.email'           => 'O email é invalido',
            'email.unique'          => 'O email inserido esta em uso, informe um diferente',
            'password.required'     => 'A senha é obrigatória.',
            'password.confirmed'    => 'senhas nao correspondem',
            'password.min'          => 'A senha deve ter no minimo 8 caracteres',
        ];
    }
}
