<?php

namespace App\Livewire\Instructor;

use App\Jobs\SendCredencialToUserEmailJob;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class RegisterLivewire extends Component
{
    public $name,
           $email,
           $surname,
           $phone_number,
           $specialty,
           $biography;
        
    protected $rules = [
        'name'         => 'required|string|max:255',
        'email'        => 'required|email|unique:users',
        'surname'      => 'required|string|max:255',
        'phone_number' => 'required|numeric',
        'specialty'    => 'required|string|max:255',
        'biography'    => 'required|string'
    ];

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
        'specialty.required' => 'A especialidade é obrigatória.',
        'specialty.string' => 'A especialidade deve ser um texto.',
        'specialty.max' => 'A especialidade não pode ter mais de 255 caracteres.',
        'biography.required' => 'A biografia é obrigatória.',
        'biography.string' => 'A biografia deve ser um texto.',
    ];

    public function render()
    {
        return view('livewire.instructor.register-livewire');
    }

    public function create()
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        
        $this->validate();
        $password = strtolower(Str::slug($this->name)).'-'.rand(1000, 9999);
        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'password' => Hash::make($password),
        ]);
        $user->assignRole('instrutor');
        $user->syncRolePermissions();

        $user->instructors()->create([
            'biography' => $this->biography,
            'specialty' => $this->specialty
        ]);
        request()->session()->flash('success', 'Instrutor registado com sucesso!!! informe ao instrutor para verificar o seu email para obtenção das credencias');

        SendCredencialToUserEmailJob::dispatch($user, $password);
    }
}
