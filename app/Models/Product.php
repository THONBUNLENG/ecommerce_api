<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'long_description',
        'price',
        'original_price',
        'discount_price',
        'category_id',
        'stock_quantity',
        'stock_status',
        'image_url',
        'user_id',
        'is_popular',
        'is_latest_drop',
        'is_active',
        'meta_title',
        'meta_description',
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
