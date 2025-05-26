<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class IndexLivewire extends Component
{
    public $search;

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        $query->where(['published' => true]);
        $products = $query->paginate(12);
        return view('livewire.products.index-livewire', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
    
        // Verifica se o curso já está no carrinho
        $exists = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        })->isNotEmpty();
    
        if ($exists) {
            request()->session()->flash('warning', 'Este Produto já está na sua carrinha de compras.');
        } else {
            Cart::add([
                'id'      => $product->id,
                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->price,
                'weight'  => 0,
                'options' => ['cover' => 'products/' . $product->image,
                                'allow_multiple' => false,
                                'model' => Product::class
                            ]
            ]);
    
            request()->session()->flash('success', 'Livro adicionado com sucesso à carrinha de compras.');
        }
    
        return redirect()->back();
    }
}
