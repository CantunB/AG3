<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TariffAgency extends Model
{
    protected $table = 'tariff_agencies';
    public $timestamps = false;

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class,'id_agency');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(TypeUnit::class,'type_unit');
    }

    public function getPlace($zona, $agency)
    {
        $agencia = TariffAgency::where('id_zona',$zona)
                            ->where('id_agency', $agency)
                            ->first('place_service');
        return collect($agencia);
    }
    public static function getTariff($zona, $agency)
    {
        return TariffAgency::where('id_zona',$zona)
                            ->where('id_agency', $agency)
                            ->get();
    }
    public static function getUnit($zona, $agency)
    {
        return  TariffAgency::where('id_zona',$zona)
                            ->where('id_agency', $agency)
                            ->get();
    }
}
