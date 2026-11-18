<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['cart_id', 'book_id', 'quantity'])]
class CartItem extends Model
{
    /**
     * One cart item belongs to one cart
     */
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    /**
     * One cart item belongs to one book
     */
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
