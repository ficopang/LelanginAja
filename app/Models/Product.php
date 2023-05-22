<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'product_id');
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'product_id');
    }
}
