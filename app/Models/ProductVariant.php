<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku',
        'title',
        'price',
        'compare_price',
        'cost',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function options()
    {
        return $this->belongsToMany('App\Models\ProductOption');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
