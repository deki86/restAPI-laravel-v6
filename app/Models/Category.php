<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The date attribute for soft delete
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected  $fillable = [
        'name',
        'description',
    ];

    /**
     * Relation between Category model and Product model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
