<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_id',
        'product_name',
        'category',
        'price',
        'quantity',
        'product_image',
        'product_image2',
        'product_image3',
        'description'
    ];
}
