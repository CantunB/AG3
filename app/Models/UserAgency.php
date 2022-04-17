<?php

namespace App\Models;

use App\User;
use App\Models\Agency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class UserAgency extends Model
{
    protected $table = 'user_agency';
    protected $fillable = [
        'id_manager',
        'id_agency',
    ];
    public $timestamps = false;

    protected $appends = ['user', 'agencia'];


    // public function getManager($value)
    // {
    //     $this->attributes['id_manager'] =
    // }
    public function getUsersAttribute()
    {
        return $this->getUser();
    }

    public function getUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_manager');
    }

    public function getAgency(): BelongsTo
    {
        return $this->belongsTo(Agency::class, 'id_agency');
    }

    public function getAgenciaAttribute(){

        return $this->getAgency->name ?? $this->getAgency->business_name;
    }

    public function getUserAttribute(){

        return $this->getUser->fullname;
    }
}
