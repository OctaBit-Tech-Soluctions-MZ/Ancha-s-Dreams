<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ListLivewire extends Component
{
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.products.list-livewire', compact('products'));
    }
}
