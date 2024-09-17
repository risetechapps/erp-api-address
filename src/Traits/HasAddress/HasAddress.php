<?php

namespace RiseTech\Address\Traits\HasAddress;

use Illuminate\Database\Eloquent\Relations\HasOne;
use RiseTech\Address\Events\Address\AddressCreateOrUpdateEvent;
use RiseTech\Address\Model\Address;

trait HasAddress
{
    public static function bootHasAddress()
    {
        static::saved(function ($model) {
            event(new AddressCreateOrUpdateEvent($model));
        });

    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'address_id');
    }
}
