<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'customer_full_name',
        'customer_comment',
        'status',
        'product_id',
        'product_count'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
