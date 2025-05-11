<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditLivewire extends Component
{
    public function render()
    {
        return view('livewire.users.edit-livewire');
    }
}
