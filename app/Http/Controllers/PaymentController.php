<?php

namespace App\Http\Controllers;

use App\Services\MpesaService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function mpesaC2B() {
        $mpesa = new MpesaService();

        $response = $mpesa->paymentC2B(1,258841515705);

        var_dump($response);
    }

    public function mpesaB2C() {
        $mpesa = new MpesaService();

        $response = $mpesa->paymentB2C(1,258841515705);

        var_dump($response);
    }
}
