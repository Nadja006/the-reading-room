<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['order_id', 'recipient_name', 'phone', 'address_line', 'city', 'postal_code', 'country'])]
class OrderAddress extends Model
{
    //
}
