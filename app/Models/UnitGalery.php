<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitGalery extends Model
{
    protected $table = 'units_images';
    protected $fillable = [ 'unit_id',
                            'photo_front_unit',
                            'photo_rear_unit',
                            'photo_right_unit',
                            'photo_left_unit',
                            'photo_inside_unit_1',
                            'photo_inside_unit_2',
                            'photo_inside_unit_3'
                        ];
}
