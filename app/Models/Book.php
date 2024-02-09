<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author', 'price', 'image', 'user_id', 'admin', 'setting_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function setting() {
        return $this->belongsTo(Setting::class);
    }
}

