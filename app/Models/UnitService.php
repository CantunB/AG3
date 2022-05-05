<?php

namespace App\Models;

use App\Models\Unit;

class UnitService extends Unit
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
