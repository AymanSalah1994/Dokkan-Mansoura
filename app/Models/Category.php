<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;
    use HasFactory;
    protected $table = "categories";

    protected $fillable = [
        'name', 'slug', 'description', 'status', 'popular',
        'keywords', 'category_picture'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
