<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeUnit extends Model
{
    protected $table = 'type_units';
    protected $fillable = [
        'type_units',
    ];

    public $timestamps = false;
}
