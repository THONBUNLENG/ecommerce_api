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
        'sizes',
        'colors',
        'weight',
        'dim_l',
        'dim_w',
        'dim_h',
        'manufacturer',
        'drop_shipper',
        'extended_specs',
        'search_words',
        'waist_sizes',
        'is_recommended',
        'gift_wrap',
        'back_order',
        'custom_1',
        'custom_2',
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
        'waist_sizes' => 'array',
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


    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getPrimaryImageAttribute()
    {
        $primary = $this->images()->where('is_primary', true)->first();
        if ($primary) {
            return asset('storage/' . $primary->image_path);
        }
        $first = $this->images()->orderBy('sort_order')->first();
        if ($first) {
            return asset('storage/' . $first->image_path);
        }
        $legacyUrl = $this->attributes['image_url'] ?? null;
        return $legacyUrl ? asset('storage/' . $legacyUrl) : null;
    }

    public function getImageUrlAttribute()
    {
        $legacyUrl = $this->attributes['image_url'] ?? null;
        if ($legacyUrl) {
            return asset('storage/' . $legacyUrl);
        }
        return $this->primary_image;
    }
}
