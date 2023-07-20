<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = [
        'id_zona',
        'country',
        'state',
        'municipio',
        'localidad',
        'hotel',
        'address',
        'cp',
        'telephone',
        'latitude',
        'longitude'
    ];

    public $timestamps = false;
}
