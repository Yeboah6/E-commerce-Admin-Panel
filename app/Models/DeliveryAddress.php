<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $table = 'delivery_addresses';

    protected $fillable = [
        'customer_id',
        'country',
        'first_name',
        'last_name',
        'company_name',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip_code',
        'email',
        'number',
    ];
}
