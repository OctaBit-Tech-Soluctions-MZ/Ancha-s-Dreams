<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $request->name,
                "price" => $request->price,
                "photo" => $request->photo,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => 'Curso adicionado ao carrinho com sucesso!']);
    }

    public function viewCart()
    {
        return view('cart.view');
    }

}
