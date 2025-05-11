<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class RegisterLivewire extends Component
{
    public $name,
           $email,
           $surname,
           $phone_number,
           $password;
    /**
     * Regra de Validação do Formulario
     */
    protected $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users',
        'surname'  => 'required|string|max:255',
        'phone_number' => 'required|numeric',
        // 'password' => 'required|confirmed|min:8', Não Esquece de descomentar
        'password' => 'required|min:8',
    ];

    /**
     * Mensagem de Erros do Formulario
     */
    protected $messages = [
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
        'password.required' => 'A senha é obrigatória.',
        'password.confirmed' => 'A confirmação da senha não corresponde.',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
    ];

    public function render()
    {
        return view('livewire.auth.register-livewire');
    }

    public function create() {

        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'password' => Hash::make($this->password),
        ]);
        
        $user->assignRole('aluno');
        $user->syncRolePermissions();
        
        Auth::login($user);
        
        return redirect(route('home'));
    }
}
