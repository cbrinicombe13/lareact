<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Order extends Model
{
    use HasFactory, HasStatuses;

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
        return $this->belongsToMany('App\Models\ProductVariant')
            ->using('App\Models\OrderProductVariant');
    }

    public function addresses()
    {
        return $this->morphMany('App\Models\Address', 'addressable');
    }
}
