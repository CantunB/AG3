<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
class Operator extends Authenticatable
{
    use Notifiable;

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
            'driver_license',
            'operator_photo',
            'status'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
