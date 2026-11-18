<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'total_price', 'status'])]
class Order extends Model
{
    /**
     * One order has many order items.
     */
    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
