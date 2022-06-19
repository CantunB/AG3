<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelLoad extends Model
{
    protected $table = 'fuel_load';

    protected $fillable = [ 'id_operator','id_unit','mileage','liters','amount'];
}
