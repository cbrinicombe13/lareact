<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'value'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function variants()
    {
        return $this->belongsToMany('App\Models\ProductVariant');
    }
}
