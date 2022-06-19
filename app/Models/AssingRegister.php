<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssingRegister extends Model
{
    use SoftDeletes;

    protected $table = 'assigned_registers';

    protected $fillable = [
        'id_register',
        'id_unit',
        'id_operator',
    ];

    protected $appends = ['servicio', 'agencia','unidad'];
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
    public function operator(): BelongsTo
    {
        return $this->belongsTo(Operator::class, 'id_operator');
    }

    /**
     * Get the user associated with the AssingRegister
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(AssignRegisterStatus::class, 'id_assigned');
    }

    public function getUnidadAttribute(){

        return $this->unit->unit;
    }

    public function getServicioAttribute(){

        return $this->register->Type_service->name;
    }
    public function getAgenciaAttribute(){

        return $this->register->Agency->business_name;
    }
}
