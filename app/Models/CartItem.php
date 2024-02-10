<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'book_id',
        'quantity',
        'unit_price',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
