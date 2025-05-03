<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $bg;

    public function mount($bg = '')
    {
        $this->bg = $bg;
    }
    public function render()
    {
        return view('livewire.header');
    }
}
