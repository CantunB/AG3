<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TypeTrip extends Model
{
    protected $table = 'type_trips';
    protected $fillable = [
        'type_trip',
    ];

    public $timestamps = false;
}
