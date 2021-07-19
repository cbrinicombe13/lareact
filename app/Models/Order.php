<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function productVariants()
    {
        return $this->belongsToMany('App\Models\ProductVariant');
    }
}
