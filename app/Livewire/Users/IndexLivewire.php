<?php

namespace App\Livewire\Users;

use App\Models\User;
use Carbon\Carbon;
use Google\Service\ServiceControl\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexLivewire extends Component
{
    public function render()
    {
        $users = User::with('roles', 'blocked')->where('id', '<>', Auth()->id())->get();
        return view('livewire.users.index-livewire', compact('users'));
    }

    public function unblocked($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if(!auth()->user()->hasAnyRole('super admin')){
            abort(403, 'Não tens autorização para realizar a operação');
        }

        $user = User::findOrFail($id);

        $user->blocked()->update([
            'unblocked_at' => Carbon::now(),
            'is_blocked' => false
        ]);

        return request()->session()->flash('success', 'Utilizador desbloqueado com sucesso');
    }
}
