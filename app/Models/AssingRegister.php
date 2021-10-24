<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AssingRegister extends Model
{
    protected $table = 'assign_registers';
    protected $fillable = [
        'id_register',
        'id_unit',
        'id_operator',
        'price',
        'cash',
        'usd',
        'invoice',
        'observations',
        'payment',
        'service'
    ];

    /**
     * Get the registers that owns the AssingRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function register(): BelongsTo
    {
        return $this->belongsTo (Register::class, 'id_register');
    }

    /**
     * Get the units that owns the AssingRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    /**
     * Get the Operator that owns the AssingRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Operator(): BelongsTo
    {
        return $this->belongsTo(Operator::class, 'id_operator');
    }
}
