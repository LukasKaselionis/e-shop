<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'order_number',
        'grand_total',
        'first_name',
        'last_name',
        'city',
        'street_address',
        'email',
        'phone_number'
    ];

    /**
     * @return HasMany
     */
    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

}
