<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function watchlists(): HasMany
    {
        return $this->hasMany(Watchlist::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'product_id');
    }

    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class, 'product_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalBidAmount()
    {
        return $this->bids()->sum('bid_amount') + $this->starting_price;
    }

    public function undiscountedPrice()
    {
        return $this->starting_price * 2;
    }

}
