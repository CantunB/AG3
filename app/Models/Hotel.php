<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = [
        'zona',
        'state',
        'municipio',
        'head',
        'hotel',
    ];

    public $timestamps = false;
}
