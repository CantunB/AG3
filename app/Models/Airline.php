<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';
    protected $fillable = [ 'terminal','airport', 'airline','destiny','code' ];

}
