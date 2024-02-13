<?php

namespace Modules\Worker\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Mail\Entities\TemporaryWorkerToken;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Setting\Entities\WorkerLevel;
use Modules\Support\Entities\WorkerTicket;
use Modules\Task\Entities\TaskProof;
use Modules\Task\Entities\TaskWorker;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Worker extends Authenticatable implements JWTSubject
{
    use HasFactory,SoftDeletes;

    protected $guard = 'worker';



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }




    protected $fillable = [
        'worker_number',
        'name',
        'email',
        'avatar',
        'country_id',
        'city_id',
        'phone',
        'worker_level_id',
        'gender',
        'description',
        'address',
        'zip_code',
        'status',
        'suspend_days',
        'suspend_start_date',
        'wallet_balance',
        'total_earns',
        'paypal_account', //sb-hqp4y25301230@business.example.com
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
        return $this->belongsTo(WorkerLevel::class,'worker_level_id');
    }

    public function proofs(){
        return $this->hasMany(TaskProof::class);
    }

    public function tasks(){
        return $this->hasMany(TaskWorker::class);
    }
    public function tickets(){
        return $this->hasMany(WorkerTicket::class);
    }
    public function temporaryToken(){
        return $this->hasMany(TemporaryWorkerToken::class);
    }

    public function privileges(){
        return $this->hasMany(WorkerPrivilege::class);
    }
}
