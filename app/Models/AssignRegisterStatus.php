<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AssignRegisterStatus extends Model
{
    protected $table = 'assigned_services_status';

    protected $fillable = [
        'id_assigned',
        'status',
        'aware',
        'slope',
        'on_board',
        'passenger_number',
        'bag_number',
        'start',
        'finalized',
    ];

}
