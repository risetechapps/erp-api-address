<?php

namespace RiseTech\Address\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use RiseTech\Address\Traits\HasUuid\HasUuid;
use RiseTech\ToUpper\Traits\hasToUpper;

class Address extends Model
{
    use HasFactory, Notifiable, HasUuid, SoftDeletes, hasToUpper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address_type',
        'address_id',
        'zip_code',
        'country',
        'state',
        'city',
        'district',
        'address',
        'number',
        'complement',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'address_type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
