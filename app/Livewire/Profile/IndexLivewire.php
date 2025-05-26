<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class IndexLivewire extends Component
{
    public function render()
    {
        return view('livewire.profile.index-livewire');
    }
}
