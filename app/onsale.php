<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class onsale extends Model
{
    protected $fillable = [
        'productID','discount', 'date_start', 'date_end'
    ];
}
