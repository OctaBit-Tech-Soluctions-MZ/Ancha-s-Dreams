<?php

namespace App\Livewire;

use App\Jobs\SendWhatsappMessage;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
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

    public function sendOrder()
    {
        $message = '';
        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'É necessario uma conta para finalizar o pedido, faça o login ou crie uma conta caso não tenha <a href="' . route('register') . '" wire:navigate>Criar Conta</a>');
        }

        if (!auth()->user()->hasAnyPermission('Comprar')) {
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
            $message = $this->orderMessage($order);

            request()->session()->flash('success', 'Pedido Enviado com sucesso, para mais detalhes verifique o seu whatsapp');
            Cart::destroy();

            return redirect(generateWhatsappLink($message));
        } else {
            return request()->session()->flash('warning', 'Nenhum item foi encontrado, por favor adicione alguem item antes de finalizar o pedido!');
        }
    }

    private function orderMessage($order)
    {
        $user = $order->users;

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);

        $qrCode = generateQrCode(route('orders.invoice', ['id' => $order->id]));

        // Gerar HTML da view
        $html = view('invoice.order-invoice', ['order' => $order, 'qrCode' => $qrCode])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Salvar PDF no storage
        $pdfFileName = "pedido_{$order->id}.pdf";
        $pdfPath = "orders/{$pdfFileName}";
        Storage::put($pdfPath, $dompdf->output());

        // Gerar link para download
        $url = route('orders.invoice', ['id' => $order->id]);

        // Mensagem no estilo WhatsApp
        $message = <<<MSG
        *======= Novo Pedido Realizado =======*

        *Cliente:* {$user->name} {$user->surname}
        *Email:* {$user->email}
        *Pedido ID:* #{$order->id}
        *PDF do Pedido:* {$url}
        MSG;

        return $message;
    }
}
