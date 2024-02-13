<?php

namespace Modules\Employer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\DiscountCode\Entities\EmployerTaskDiscountCode;
use Modules\Mail\Entities\TemporaryEmployerToken;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Setting\Entities\EmployerLevel;
use Modules\Support\Entities\EmployerTicket;
use Modules\Task\Entities\Task;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class Employer extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;
    protected $guard = 'employer';


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    protected $fillable = [
        'employer_number',
        'name',
        'email',
        'avatar',
        'country_id',
        'city_id',
        'phone',
        'employer_level_id',
        'gender',
        'description',
        'address',
        'zip_code',
        'status',
        'suspend_days',
        'suspend_start_date',
        'wallet_balance',
        'total_spends',
        'password',
        'email_verified_at',
        'mobile_verified_at',
        'google_id',
        'facebook_id',
        'apple_id',
        'current_currency',
    ];



    protected $hidden = [

        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
    ];
    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Task::class, 'employer_id', 'id');
    }


    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(EmployerLevel::class,'employer_level_id');
    }
    public function discountCodes(){
        return $this->hasMany(EmployerTaskDiscountCode::class);
    }
    public function tickets(){
        return $this->hasMany(EmployerTicket::class);
    }
    public function temporaryToken(){
        return $this->hasMany(TemporaryEmployerToken::class);
    }
    public function privileges(){
        return $this->hasMany(EmployerPrivilege::class);
    }

}
