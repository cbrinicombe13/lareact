<?php

namespace App\Models;

use App\Traits\HasNotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

class Order extends Model
{
    use HasFactory, HasStatuses, HasNotes, SoftDeletes;

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
