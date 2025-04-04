<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Simplesmente retorna uma mensagem de sucesso (pode ser substituído por envio de e-mail)
        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
