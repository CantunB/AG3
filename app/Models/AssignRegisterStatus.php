<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AssignRegisterStatus extends Model
{
    protected $table = 'assigned_services_status';

    protected $fillable = [
        'id_assigned',
        'status',
        'comment',
        'aware',
        'coordinates_aware',
        'slope',
        'coordinates_slope',
        'on_board',
        'coordinates_onboard',
        'noshow',
        'coupon',
        'passenger_number',
        'bag_number',
        'start',
        'coordinates_start',
        'finalized',
        'coordinates_finalized',
    ];

}
