<?php

namespace App\Models;


class Buyer extends User
{
    /**
     * Relation between Buyer model and Transaction model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
