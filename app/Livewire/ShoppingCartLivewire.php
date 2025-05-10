<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class ShoppingCartLivewire extends Component
{
    public function render()
    {
        $items = Cart::content();
        return view('livewire.shopping-cart-livewire', compact('items'));
    }

    public function removeToCart($rowId)
    {
        Cart::remove($rowId);
    }

    public function sendOrder(){
        $message = '';
        if (!auth()->check()) {
          return redirect()->route('login')->with('warning', 'É necessario uma conta para finalizar o pedido, faça o login ou crie uma conta caso não tenha <a href="'.route('register').'" wire:navigate>Criar Conta</a>');  
        }

        if(!auth()->user()->hasAnyPermission('Comprar')){
            abort(403, 'Acesso Não Autorizado');
        }
        if (count(Cart::content()) != 0) {
            $order = auth()->user()->orders()->create();
            foreach (Cart::content() as $item) {
                $order->order_items()->create([
                    'itemable_id' => $item->id,
                    'qty' => $item->qty,
                    'itemable_type' => $item->options->model
                ]);
            }
            request()->session()->flash('success', 'Pedido Enviado com sucesso, para mais detalhes verifique o seu whatsapp');
            Cart::destroy();
        }else{
            request()->session()->flash('warning', 'Nenhum item foi encontrado, por favor adicione alguem item antes de finalizar o pedido!');
        }
    }
}
