<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = "cartitems";
    protected $fillable = [
        'user_id',
        'quantity',
        'status',
        'product_id' ,
        'order_id'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
