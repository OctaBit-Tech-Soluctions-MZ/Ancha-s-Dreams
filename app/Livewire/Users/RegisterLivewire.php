<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class RegisterLivewire extends Component
{
    public function render()
    {
        return view('livewire.users.register-livewire');
    }
}
