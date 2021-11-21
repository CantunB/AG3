<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OriginDestiny extends Model
{
    protected $table = 'origin_destiny';
    protected $fillable = [
        'category',
        'name',
    ];

    public $timestamps = false;
}
