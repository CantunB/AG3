<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $fillable = [
        'business_name',
        'name',
        'rfc',
        'address',
        'telephone',
        'email',
        'agency_logo',
        'agencies_photo',
        'contact',
        'fiscal_situation'
    ];

}
