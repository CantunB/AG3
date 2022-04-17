<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitGalery extends Model
{
    protected $table = 'units_images';
    protected $fillable = [ 'unit_id',
                            'images'
                        ];
}
