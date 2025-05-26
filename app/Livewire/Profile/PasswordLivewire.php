<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class PasswordLivewire extends Component
{
    public $old_password,
        $password,
        $password_confirmation;

    protected $rules = [
        'old_password' => 'required',
        'password' => 'required|min:8'
    ];

    protected $message = [
        'old_password.required' => 'A antiga palavra-passe é obrigatoria',
        'password.required' => 'A nova palavra-passe é obrigatoria',
        'password.min' => 'a palavra-passe deve ter no minimo 8 caracteres'
    ];
    public function render()
    {
        return view('livewire.profile.password-livewire');
    }

    public function update()
    {
        $this->validate();
        $user = User::findOrFail(auth()->id());
        if (!Hash::check($this->old_password, $user->password)) {
            throw ValidationException::withMessages(['old_password' => 'palavra-antiga não corresponde, verifique novamente']);
        }
        if ($this->password != $this->password_confirmation) {
            throw ValidationException::withMessages(['password' => 'palavras-passe não correspondem']);
        }
        $user->update(['password' => Hash::make($this->password)]);

        return request()->session()->flash('success', 'palavra-passa alterada com sucesso');
    }
}
