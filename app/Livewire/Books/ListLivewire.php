<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ListLivewire extends Component
{
    public function render()
    {
        $books = Book::paginate(10);
        return view('livewire.books.list-livewire', compact('books'));
    }

    public function publish($id, $value)
    {
        Book::findOrFail($id)->update([
            'published' => $value
        ]);
    }
}
