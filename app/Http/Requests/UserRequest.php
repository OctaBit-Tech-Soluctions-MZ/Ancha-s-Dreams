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
            $rules ['experience'] = 'required|numeric|max:3';
        }

        return $rules;
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
            'phone_number.required'   => 'O Numero de telefone é obrigatório.',
            'phone_number.numeric'    => 'Numero de Telefone invalido',
            'phone_number.max'        => 'Numeros nacionais (Moz) nao podem exceder 9 digitos sem o prefixo',
            'surname.required'      => 'O Apelido é obrigatório.',
            'nivel.required'        => 'O nivel de habilidade é obrigatório.',
            'specialty.required'    => 'A especialidade é obrigatório.',
            'experience.required'   => 'O campo de Anos de Experiencia é obrigatório.',
            'experience.numeric'    => 'O Anos de Experiencia devem ser em numeros',
            'biography.required'    => 'A Biografia é obrigatória.',
        ];
    }
}
