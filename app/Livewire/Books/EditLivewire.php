<?php

namespace App\Livewire\Books;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditLivewire extends Component
{
    public function render()
    {
        return view('livewire.books.edit-livewire');
    }
}
