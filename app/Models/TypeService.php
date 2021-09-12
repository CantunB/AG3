<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    protected $table = 'type_services';
    protected $fillable = [ 'name', 'description', 'status' ];

}
