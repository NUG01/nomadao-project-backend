<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function getSession()
    {
    //    $stripe=new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

    //    $stripe->checkout->session->create([
    //     'line_items' => [[
    //       # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    //       'price' => '{{PRICE_ID}}',
    //       'quantity' => 1,
    //     ]],
    //     'mode' => 'payment',
    //     'success_url' => env('BACKEND_URL') . '/success',
    //     'cancel_url' => env('BACKEND_URL') . '/cancel',
    //   ]);

    }
}
