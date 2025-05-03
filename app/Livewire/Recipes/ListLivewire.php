<?php

namespace App\Livewire\Recipes;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class ListLivewire extends Component
{
    public function render()
    {
        return view('livewire.recipes.list-livewire');
    }
}
