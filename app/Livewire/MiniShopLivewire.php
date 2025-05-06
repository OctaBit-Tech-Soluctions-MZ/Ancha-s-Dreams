<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class MiniShopLivewire extends Component
{
    public function render()
    {
        return view('livewire.mini-shop-livewire');
    }
}
