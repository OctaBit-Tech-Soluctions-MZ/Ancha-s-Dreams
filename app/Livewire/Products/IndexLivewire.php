<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render()
    {
        $products = Product::where('published', true)->paginate(12);
        return view('livewire.products.index-livewire', compact('products'));
    }
}
