<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Register;
use App\Models\UserAgency;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use SoftDeletes;
    protected $table = 'agencies';
    protected $fillable = [
        'business_name',
        'name_agency',
        'rfc',
        'address',
        'telephone',
        'email_agency',
        'site_web',
        'agency_logo',
        'fiscal_situation',
        'current_rate',
        'proof_address',
        'covenants',
    ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value ?? Str::substr($this->attributes['rfc'], 0, 5) . Carbon::now()->format('Y'));
    // }
    /**
    * Get all of the comments for the Agency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function services(): HasMany
    {
        return $this->hasMany(Register::class, 'agency_id');
    }

    /**
    * Get all of the comments for the Agency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function user_agency(): HasMany
    {
        return $this->hasMany(UserAgency::class, 'id_agency');
    }

    /**
     * The roles that belong to the Agency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(UserAgency::class, 'user_agency', 'id_agency', 'id_manager');
    }

}
