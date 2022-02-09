<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Register;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Agency extends Model
{
    protected $table = 'agencies';
    protected $fillable = [
        'business_name',
        'name',
        'rfc',
        'address',
        'telephone',
        'email',
        'password',
        'agency_logo',
        'contact',
        'telephone_contact',
        'fiscal_situation',
        'current_rate',
        'proof_address',
        'covenants',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value ?? Str::substr($this->attributes['rfc'], 0, 5) . Carbon::now()->format('Y'));
    }
    /**
    * Get all of the comments for the Agency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function services(): HasMany
    {
        return $this->hasMany(Register::class, 'agency_id');
    }
}
