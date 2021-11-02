<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    protected $table = 'type_services';
    protected $fillable = [ 'name', 'description', 'status' ];

    public function scopeActive($query){
        return $query->where('status',1)->orderBy('name','ASC')->get();
    }

    public function scopeServices($query){

    }
}
