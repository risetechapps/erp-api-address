<?php

namespace RiseTech\Address;

class Address
{
    protected static array $address = [];

    public static function setAddress(array $address): void
    {
        static::$address=$address;
    }

    public static function getAddress(): array{
        return static::$address;
    }
}
