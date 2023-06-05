<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Request $req, $vehicle_id)
    {
        $vehicle = Vehicle::where('id', $vehicle_id)->first();
        return view('order', ['vehicle' => $vehicle]);
    }

    public function order(Request $req, $vehicle_id)
    {
        $date = new DateTime('now');
        $date->modify('+90 day');
        $date = $date->format('Y-m-d');
        $rules = [
            'book-start' => 'required|date|after_or_equal:{{ new DateTime("now")->format("Y-m-d") }}|before_or_equal:' . $date,
            'duration' => 'required|min:1|max:30',
            'payment' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return redirect(route('order', $vehicle_id))->with('failed', "{{$validator->errors()}}");
        } else {
            try {
                $order = new Order;
                $order->user_id = $req->input('user_id');
                $order->vehicle_id = $req->input('vehicle_id');
                $order->booked_at = $req->input('book-start');
                $order->duration_in_days = $req->input('duration');
                $order->payment_method = $req->input('payment');
                $order->save();
                return redirect(route('order-successful'))->with('status', "Ordered successfully");
            } catch (Exception $e) {
                return redirect(route('order', $vehicle_id))->with('failed', "operation failed {{$e->getMessage()}}");
            }
        }
    }

    public function delete(Request $req, $id)
    {
        try {
            $order = Order::find($id);
            $order->delete();
            return redirect(route('account'))->with('status', "Deleted successfully");
        } catch (Exception $e) {
            return redirect(route('account'))->with('failed', "operation failed {{$e->getMessage()}}");
        }
    }

    public function showEdit(Request $req, $id)
    {
        $order = Order::find($id);
        $vehicle = Vehicle::find($order->vehicle_id);
        return view('edit', ['order' => $order, 'vehicle' => $vehicle]);
    }

    public function edit(Request $req, $id)
    {
        $date = new DateTime(now());
        $date->modify('+90 day');
        $date = $date->format('Y-m-d');
        $rules = [
            'book-start' => 'required|date|after_or_equal:{{ new DateTime(Order::find($id)->booked_at)->format("Y-m-d") }}|before_or_equal:' . $date,
            'duration' => 'required|min:1|max:30',
            'payment' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return redirect(route('order.edit', $id))->with('failed', "{{$validator->errors()}}");
        } else {
            try {
                $order = Order::find($id);
                $order->booked_at = $req->input('book-start');
                $order->duration_in_days = $req->input('duration');
                $order->payment_method = $req->input('payment');
                $order->save();
                return redirect(route('order-successful'))->with('status', "Edited successfully");
            } catch (Exception $e) {
                return redirect(route('order.edit', $id))->with('failed', "operation failed {{$e->getMessage()}}");
            }
        }
    }
}
