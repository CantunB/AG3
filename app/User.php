<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserAgency;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable, SoftDeletes;

    const usuario_activo = '1';
    const usuario_no_activo = '0';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'photo_user'
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

    //protected $appends = ['avatar'];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getAvatarAttribute(){
    //     return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) );
    // }
    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->paterno} {$this->materno}";
    }

    /**
    * Get all of the comments for the Agency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function assigned_agency(): HasMany
   {
       return $this->hasMany(UserAgency::class, 'id_manager');
   }

}
