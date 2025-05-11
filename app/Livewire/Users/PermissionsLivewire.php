<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class PermissionsLivewire extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $user = User::with('permissions')->where('slug', $this->slug)->firstOrFail();
        $permissions = $user->permissions;
        return view('livewire.users.permissions-livewire', compact('user', 'permissions'));
    }
}
