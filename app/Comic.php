<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'series',
        'date',
        'slug',
        'type'
    ];

}
