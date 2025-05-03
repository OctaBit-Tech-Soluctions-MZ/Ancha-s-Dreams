<?php

namespace App\Livewire\Users;

use App\Models\User;
use Google\Service\ServiceControl\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexLivewire extends Component
{
    public function render()
    {
        $users = User::with('roles')->where('id','<>', Auth()->id())->paginate(10);
        return view('livewire.users.index-livewire', compact('users'));
    }
}
