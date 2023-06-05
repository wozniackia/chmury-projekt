<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function show()
    {
        $orders = Order::select('orders.id as order_id', 'orders.*', 'fleet.*')->join('fleet', 'orders.vehicle_id', 'fleet.id')->where('orders.user_id', Auth::user()->id)->get();
        return view('account', ['orders' => $orders]);
    }
}
