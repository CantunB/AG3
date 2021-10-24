<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Unit extends Model
{
    protected $table = 'units';

    protected $fillable = [ 'unit',
                            'type',
                            'brand',
                            'model',
                            'frame',
                            'engines',
                            'total_price',
                            'file_invoice_unit',
                            'file_permission_sct',
                            'file_contract',
                            'plate_number',
                            'circulation_card',
                            'car_insurance',
                            'file_plate_number',
                            'file_circulation_card',
                            'file_car_insurance',
                        ];

    public function scopeActive($query){
        return $query->where('status',1)->get();
    }

    /**
     * Get the user that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function isAssigned(): BelongsTo
    {
        return $this->belongsTo(AssingRegister::class, 'id', 'id_unit');
    }
}
