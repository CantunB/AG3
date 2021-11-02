<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Operator extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    const operador_activo = '1';
    const operador_no_activo = '0';

    protected $table ='operators';

    protected $guard = 'operator';

        protected $fillable = [
            'name',
            'paterno',
            'materno',
            'phone',
            'email',
            'password',
            'birthday_date',
            'address',
            'cp',
            'birth_certificate',
            'proof_address',
            'nss',
            'curp',
            'rfc',
            'ine',
            'driver_license',
            'operator_photo',
            'status'
        ];
        protected $hidden = [
            'password', 'remember_token',
        ];


    public function scopeActive($query){
        return $query->where('status',1)->get();
    }
    /**
     * Get the user that owns the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function isAssigned(): BelongsTo
    {
        return $this->belongsTo(AssingRegister::class, 'id','id_operator');
    }

}
