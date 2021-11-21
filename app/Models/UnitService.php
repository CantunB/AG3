<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitService extends Model
{
    protected $table = 'units_services';
    protected $fillable = [ 'unit_id',
                            'date',
                            'mileage',
                            'service',
                            'workshop',
                            'cost',
                            'notes',
                            'file_invoice'
                        ];

}
