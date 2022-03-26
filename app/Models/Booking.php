<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Country;
use App\Models\State;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'slug',
        'name',
        'paterno',
        'materno',
        'email',
        'phone',
        'country_id',
        'state_id',
        'type_service',
        'origin',
        'destiny',
        'passenger',
        'airline_arrival',
        'flight_number_arrival',
        'date_arrival',
        'time_arrival',
        'comments_arrival',
        'round_service',
        'airline_departure',
        'flight_number_departure',
        'date_departure',
        'time_departure',
        'comments_departure',
        'request_unit',
        'price',
        'divisa',
        'type_payment',
        'transaction_id',
        'paypal_id',
        'status_payment',
        'status_booking'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->paterno} {$this->materno}";
    }

    public function scopeTermino($query, $termino)
    {
        if($termino === ''){
            return;
        }
        return $query->where('slug' , 'like', "%{$termino}%")
                    ->orWhere('origin' , 'like', "%{$termino}%")
                    ->orWhere('destiny' , 'like', "%{$termino}%")
                    //Busqueda para llave foranea
                    // ->orWhereHas('relacion(has_one)', function($query2) use ($termino){
                    //     $query2->where('llave', 'like', "%{$termino}%");
                    // })
                    ;
    }

    public function scopeStatuspayment($query, $status)
    {
        if($status === ''){
            return;
        }
        return $query->where('status_payment', $status);
    }


    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function TypeUnit(): BelongsTo
    {
        return $this->belongsTo(TypeUnit::class, 'request_unit');
    }

    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function State(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
