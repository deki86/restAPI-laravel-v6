<?php

namespace App\Models;


use App\Scopes\BuyerScope;

class Buyer extends User
{
    /**
     * Booting up a Buyer scope
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BuyerScope);
    }
    /**
     * Relation between Buyer model and Transaction model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
