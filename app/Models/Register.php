<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Register extends Model
{
    protected $table = 'registers';
    protected $fillable = [ 'date',
                            'agency_id',
                            'type_service_id',
                            'airline_id',
                            'terminal',
                            'flight_number',
                            'flight_time',
                            'origin',
                            'destiny',
                            'passenger',
                            'passenger_number',
                            'pickup',
                            'requested_unit',
                            'place_service'
                        ];

    public function Agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function Type_service()
    {
        return $this->belongsTo(TypeService::class, 'type_service_id');
    }

    public function Airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id');
    }
    /**
     * The roles that belong to the Register
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function isAssigned(): BelongsTo
    {
        return $this->belongsTo(AssingRegister::class, 'id','id_register');
    }

    public function counter()
    {
     return $this::where('clave_elector', 'not like', "%@%")->select('seccion')->where('seccion', $seccion)->count();

    }

}
