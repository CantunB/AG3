<?php

namespace App\Models;

use App\Models\Unit;
class UnitGalery extends Unit
{
    protected $table = 'units_images';
    protected $fillable = [ 'unit_id',
                            'images'
                        ];
}
