<?php

namespace App\Livewire\Profile;

use App\Models\Instructor;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class EditLivewire extends Component
{
    public $name,
        $surname,
        $email,
        $phone_number,
        $biography,
        $specialty,
        $user;

    protected $rules = [
        'name'     => 'required|string|max:255',
        'surname'  => 'required|string|max:255',
        'phone_number' => 'required|numeric',
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
    ];

    public function mount()
    {
        $this->user = User::with('instructors')->findOrFail(auth()->id());
        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->phone_number = $this->user->phone_number;
        $this->email = $this->user->email;
        if (auth()->user()->hasAnyRole('instrutor')) {
            $this->biography = $this->user->instructors->biography;
            $this->specialty = $this->user->instructors->specialty;
        }
    }
    public function render()
    {
        return view('livewire.profile.edit-livewire');
    }

    public function update()
    {
        $this->rules['email']    = 'required|email|unique:users,email,'.$this->user->id;
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone_number' => $this->phone_number,
            'email' => $this->email
        ]);

        if (auth()->user()->hasAnyRole('instrutor')) {
            Instructor::where('user_id', $this->user->id)->firstOrFail()
                ->update([
                    'biography' => $this->biography,
                    'specialty' => $this->specialty,
                ]);
        }

        return request()->session()->flash('success', 'Dados actualizados com sucesso');
    }
}
