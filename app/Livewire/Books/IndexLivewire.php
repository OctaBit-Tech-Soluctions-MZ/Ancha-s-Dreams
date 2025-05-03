<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Illuminate\Http\Request;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render(Request $request)
    {
        $search = $request->search;
        $category = $request->categories;
        $orderBy = $request->order_by;

        $query = Book::query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($category) {
            $query->where('category', $category); // descomente e ajuste se necessário
        }

        if ($orderBy && in_array($orderBy, ['name', 'created_at'])) {
            $query->orderBy($orderBy);
        }

        $books = $query->paginate(9);
        return view('livewire.books.index-livewire', compact('books', 'search', 'category', 'orderBy'));
    }
}
