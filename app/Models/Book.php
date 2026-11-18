<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * One book belongs to one category.
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * One book has many cart items.
     */
    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }
}
