<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
Use App\Models\OrderItem;

class OrderController extends Controller
{
    public function add(){
        $cart = Cart::where('user_id', '=',Auth()->user()->id)-get();

        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'status' => 'Processando',
            'address' => 'Rua testetest',
            'address_number' => '001',
            'address_city' => 'cidade',
            'address_state' => 'estado',
            'cc_number' => substr($request->all()->cc_number,-4)
        ]);

        foreach($cart as $item){
            Order::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product()->price,
            ]);

            $item->delete();
        }

        return redirect(route('order.show'));

    }

    public function show(){
        return view('order.show');
    }

}
