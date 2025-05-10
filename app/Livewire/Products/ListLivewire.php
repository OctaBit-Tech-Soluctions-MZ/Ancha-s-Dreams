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

    public function publish($id, $value)
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }
        Product::findOrFail($id)->update([
            'published' => $value
        ]);
    }

    public function destroy($id)
    {
        if (!auth()->check()) {
            redirect()->route('login')->with('warning', 'Sessão Experada, faça o login novamente');
        }

        Product::findOrFail($id)->delete();

        request()->session()->flash('success', 'Produto Excluido com sucesso');
    }
}
