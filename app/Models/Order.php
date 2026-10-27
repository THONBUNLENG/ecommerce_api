<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public const PAYMENT_METHODS = ['cod', 'aba_khqr'];

    public const PAYMENT_STATUSES = ['pending', 'paid'];

    public const ORDER_STATUSES = ['processing', 'shipping', 'completed', 'cancelled'];

    protected $fillable = [
        'order_id',
        'amount',
        'status',
        'payment_method',
        'payment_status',
        'order_status',
        'shipping_address',
        'user_id',
        'total',
        'total_amount',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
