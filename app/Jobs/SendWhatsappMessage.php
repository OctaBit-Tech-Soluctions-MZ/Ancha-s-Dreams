<?php

namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SendWhatsappMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $order)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $user = $this->order->user;

        // Gerar PDF
        $pdf = Pdf::loadView('pdf.order', ['order' => $this->order]);

        $pdfPath = 'orders/pedido_' . $this->order->id . '.pdf';
        Storage::put("public/{$pdfPath}", $pdf->output());

        $url = asset("storage/{$pdfPath}");

        // Mensagem para admin
        $message = "🛒 Novo Pedido Realizado\n";
        $message .= "Cliente: {$user->name}\n";
        $message .= "WhatsApp: {$user->whatsapp}\n";
        $message .= "Pedido ID: #{$this->order->id}\n";
        $message .= "📄 PDF do pedido: {$url}";

        $adminWhatsapp = env('ADMIN_WHATSAPP');

        Http::post('https://api.ultramsg.com/instanceXXXXX/messages/chat', [
            'token' => env('ULTRAMSG_TOKEN'),
            'to' => $adminWhatsapp,
            'body' => $message,
        ]);
    }
}
