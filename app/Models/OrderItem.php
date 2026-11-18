<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['order_id', 'book_id', 'book_title', 'quantity', 'unit_price'])]
class OrderItem extends Model
{
    /**
     * One order item belongs to one order.
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /**
     * One order item belongs to one book.
     */
    public function book(){
    return $this->belongsTo(Book::class);
}
}
