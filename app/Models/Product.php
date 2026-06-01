<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock_quantity',
        'image_url',
        'user_id',
        'is_popular',
        'is_latest_drop',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

   
    // Optional: If using product_variations table
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
