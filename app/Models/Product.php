<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'category_id', 'user_id',
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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearchWord($query)
    {
        if ($search_word = request('search_word')) {
            return $query->where('name', 'LIKE', "%{$search_word}%");
        }
    }
    public function scopeSelectCategory($query)
    {
        if ($category = request('category')) {
            return $query->where('category_id', $category);
        }
    }
    public function scopeSelectMerchant($query)
    {
        if ($merchant = request('merchant')) {
            return $query->where('user_id', $merchant);
        }
    }

    public function scopeLowHigh($query)
    {
        if ($criteria = request('order_by')) {
            if ($criteria == 'LtoH') {
                return $query->orderBy('selling_price', 'ASC');
            } else {
                return $query->orderBy('selling_price', 'DESC');
            }
        }
    }

    public function scopeMiniPrice($query)
    {
        if ($minPrice = request('minimum_price')) {
            return $query->where('selling_price', '>=', $minPrice);
        }
    }
    public function scopeMaxPrice($query)
    {
        if ($maxPrice = request('maximum_price')) {
            return $query->where('selling_price', '<=', $maxPrice);
        }
    }
}
