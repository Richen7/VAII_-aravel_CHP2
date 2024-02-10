<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = $cart->cartItems()->where('book_id', $bookId)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->cartItems()->create([
                'book_id' => $book->id,
                'quantity' => 1,
                'unit_price' => $book->price,
            ]);
        }

        $cart->calculateTotal();

        if ($request->ajax()) {
            return response()->json(['success' => 'Item added to cart', 'cartTotal' => $cart->total]);
        }

        return back()->with('success', 'Item added to cart.');
    }

    public function checkout()
    {
        return view('VAII.checkout');
    }

    public function cartInfo() {
        $cart = Cart::where('user_id', Auth::id())->first();
        $data = [
            'count' => $cart ? $cart->cartItems->count() : 0,
            'total' => $cart ? $cart->cartItems->sum('unit_price') : 0,
        ];
        return response()->json($data);
    }

    public function emptyCart()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->cartItems()->delete();
            $cart->total = 0;
            $cart->save();
        }

        return back()->with('success', 'Košík bol úspešne vyprázdnený.');
    }

}
