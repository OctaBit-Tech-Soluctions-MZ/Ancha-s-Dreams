<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        echo 'tw';
        return response()->json(['message' => 'chegamos aqui'], 200);exit;
        try {
            // Lógica do pedido, processando o carrinho, validando etc.
            // Verificando o que está sendo enviado
            dd($request->json()->all()); // Aqui você verá o JSON enviado pelo JavaScript
            
            // Se o cart foi enviado corretamente, você pode processar a lógica
            $cart = $request->json()->all(); // ou $request->input('cart') se o envio não for em JSON
            // Exemplo de sucesso:
            return response()->json(['message' => 'Pedido processado com sucesso!'], 200);
        } catch (\Exception $e) {
            // Captura o erro e retorna uma resposta JSON de erro
            return response()->json(['error' => 'Erro ao processar pedido: ' . $e->getMessage()], 500);
        }
    }

}
