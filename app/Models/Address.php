<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Types of address used for orders
    const BILLING_TYPE = 'billing';
    const SHIPPING_TYPE = 'shipping';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'line_one',
        'line_two',
        'line_three',
        'city_town',
        'post_zip_code',
        'type',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function scopeBilling($query)
    {
        return $query->where('type', self::BILLING_TYPE);
    }

    public function scopeShipping($query)
    {
        return $query->where('type', self::SHIPPING_TYPE);
    }
}
