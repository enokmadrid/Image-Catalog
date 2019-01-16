<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'number',
        'price',
        'image'
    ];
}
