<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignRegisterCharges extends Model
{
    protected $table = 'assigned_services_charges';
    protected $fillable = [
        'id_assigned',
        'coin',
        'waytopay',
        'amount',
        'tip'
    ];
}
