<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    /**
     * The date attribute for soft delete
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id'
    ];

    /**
     * Get the product status
     * @return bool
     */
    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    /**
     * Relation between Product model and Category model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Relation between Product model and Seller model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Relation between Product model and Transaction model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return$this->hasMany(Transaction::class);
    }

}
