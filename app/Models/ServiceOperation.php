<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ServiceOperation extends Model
{
    protected $table = 'service_operation';

    protected $fillable = [
        'id_operator',
        'id_unit',
        'operation',
        'time',
        'mileage',
    ];

    /**
     * Get the user that owns the ServiceOperation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id');
    }


    public static function getStart($unit)
    {
        return ServiceOperation::where('id_unit',$unit)->where('operation','INICIO')->get();
    }
    public static function getFinish($unit)
    {
        return ServiceOperation::where('id_unit',$unit)->where('operation','FINALIZADO')->get();
    }

}
