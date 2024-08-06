<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $guarded = [];

    // public function product(): HasMany
    // {
    //     return $this->hasMany(Product::class, 'product_id');
    // }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
