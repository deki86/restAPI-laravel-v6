<?php

namespace App\Models;


use App\Scopes\SellerScope;

class Seller extends User
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SellerScope);
    }
    /**
     * Relation between Seller model and Product model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
