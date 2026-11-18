<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * One cart belongs to one user.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
    /**
     * One cart has many cart items.
     */
    public function items(){
        return $this->hasMany(CartItem::class);
    }
}

