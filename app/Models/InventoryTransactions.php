<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventoryTransactions extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function inventorys(): HasMany
    {
        return $this->hashMany(InventoryTransactions::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
