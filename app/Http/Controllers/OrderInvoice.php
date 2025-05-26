<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OrderInvoice extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $order = Order::findOrFail($id);

        // Verifica se é admin ou dono do pedido
        if (
            $order->user_id !== $user->id &&
            !$user->hasRole('admin') &&
            !$user->hasRole('super admin')
        ) {
            abort(403, 'Acesso não autorizado ao pedido.');
        }

        $path = storage_path("app/public/orders/pedido_{$id}.pdf");

        if (!File::exists($path)) {
            abort(404, 'PDF não encontrado.');
        }

        return response()->file($path);
    }
}
