<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function checkoutSession(Request $request)
    {
       \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

       $session=\Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                      'currency' => 'usd',
                      'product_data' => [
                        'name' => 'Deposit',
                      ],
                      'unit_amount' => $request->amount*100,
                    ],
                    'quantity' => 1,
                  ]],
                'mode' => 'payment',
                'success_url' => env('BACKEND_URL') . '/success',
                'cancel_url' => env('BACKEND_URL') . '/cancel',
       ]);

       DB::table('deposits')->insert([
           'amount'=>$request->amount,
       ]);

       return response()->json($session->url);

    }

    public function success(){
        $toBeConfirmed=Deposit::where('deactivated', 0)->orderBy('id', 'desc')->first();
        $user= User::where('id', 1)->first();
        $user->balance=$user->balance + $toBeConfirmed->amount;
        $toBeConfirmed->deactivated=1;
        $user->save();
        $toBeConfirmed->save();
        return redirect()->away(env('FRONTEND_URL') . '/');
    }
    public function cancel(){
        $toBeDeactivated = Deposit::where('deactivated', 0)->orderBy('id', 'desc')->first();
        $toBeDeactivated->delete();
        return redirect()->away(env('FRONTEND_URL') . '/');
    }
}
