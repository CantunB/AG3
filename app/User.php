<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    const usuario_activo = '1';
    const usuario_no_activo = '0';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $appends = ['avatar'];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute(){

        return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) );
    }

}
