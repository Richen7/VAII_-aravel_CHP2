<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function calculateTotal()
    {
        $total = $this->cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->unit_price;
        });

         $this->update(['total' => $total]);

        return $total;
    }
}
