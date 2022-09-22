<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'category_id' , 'user_id' ,
        'name', 'small_description', 'description', 'original_price',
        'selling_price', 'product_picture', 'quantity', 'tax', 'status',
        'trending', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function user()
    {
        // user_id = Owner_id 
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
