<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function Symfony\Component\Clock\now;

#[Layout('layouts.admin')]
class BlockedLivewire extends Component
{
    public $reason,
            $id;

    public function mount($slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();
        $this->id = $user->id;
    }
    
    public function render()
    {
        return view('livewire.users.blocked-livewire');
    }

    public function blockedUser($id)
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }

        if (!auth()->user()->hasAnyRole('super admin')) {
            return request()->session()->flash('warning', 'Não tem autorização para realização essa operação');
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
