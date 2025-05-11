<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

use function Symfony\Component\Clock\now;

class BlockedLivewire extends Component
{
    public $reason;
    
    public function render()
    {
        return view('livewire.users.blocked-livewire');
    }

    public function blockedUser($id)
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        
        $user = User::findOrFail($id);
        $user->blocked()->create([
            'reason' => $this->reason,
            'is_blocked' => true,
            'blocked_by' => auth()->id(),
            'blocked_at' => now(),
        ]);
    }
}
