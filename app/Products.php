<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'productName','category', 'description', 'image',  'stocks', 'price', 'color'
    ];
}
