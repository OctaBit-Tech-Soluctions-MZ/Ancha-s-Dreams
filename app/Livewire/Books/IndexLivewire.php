<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    public function addToCart($id)
    {
        $book = Book::findOrFail($id);
    
        // Verifica se o curso já está no carrinho
        $exists = Cart::search(function ($cartItem, $rowId) use ($book) {
            return $cartItem->id === $book->id;
        })->isNotEmpty();
    
        if ($exists) {
            request()->session()->flash('warning', 'Este Livro já está na sua carrinha de compras.');
        } else {
            Cart::add([
                'id'      => $book->id,
                'name'    => $book->title,
                'qty'     => 1,
                'price'   => $book->price,
                'weight'  => 0,
                'options' => ['cover' => 'books/' . $book->cover,
                                'allow_multiple' => false,
                                'model' => Book::class
                            ]
            ]);
    
            request()->session()->flash('success', 'Livro adicionado com sucesso à carrinha de compras.');
        }
    
        return redirect()->back();
    }
}
