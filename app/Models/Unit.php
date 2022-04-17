<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
                            'sct_permission',
                            'sct_plate_number',
                            'sct_validity',
                            'insurance_carrier',
                            'insurance_policy',
                            'insurance_start_validity',
                            'insurance_end_validity',
                            'circulation_card_number',
                            'tag_number',
                            'file_contract',
                            'file_invoice_unit',
                            'file_invoice_letter',
                            'file_permission_sct',
                            'file_sct_plate_number',
                            'file_insurance_policy',
                            'file_circulation_card',
                            'file_tag'
                        ];

    public function scopeActive($query){
        return $query->where('status',1)->get();
    }

    /**
     * Get the actives that owns the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function isAssigned(): BelongsTo
    {
        return $this->belongsTo(AssingRegister::class, 'id', 'id_unit');
    }

    /**
     * Get all of the bitacora for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bitacora(): HasMany
    {
        return $this->hasMany(UnitService::class, 'unit_id');
    }

    /**
     * Get all of the galery for the Unit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galery(): HasMany
    {
        return $this->hasMany(UnitGalery::class, 'unit_id');
    }
}
