<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function updateBalance(Request $request)
    {
        $user=User::where('id', 1)->first();
        $user->balance=$request->balance;
        $user->save();
        return response()->json('Balance updated successfuly!');
    }
}
