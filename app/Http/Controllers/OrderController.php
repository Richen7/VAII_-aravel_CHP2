<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function placeOrder(Request $request) {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $order = Order::create($validatedData);
        $this->emptyCart();

        return redirect('/');
    }

    protected function emptyCart()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->cartItems()->delete();
            $cart->total_price = 0;
            $cart->save();
        }
    }
}
