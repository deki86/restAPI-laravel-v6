<?php

namespace App\Models;


class Seller extends User
{
    /**
     * Relation between Seller model and Product model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
