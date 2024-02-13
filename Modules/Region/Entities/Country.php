<?php

namespace Modules\Region\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;
use Modules\Task\Entities\TaskCountry;
use Modules\Worker\Entities\Worker;

class Country extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'ar_name',
        'calling_code',
        'flag',
        'min_price',
        'is_arabic',
    ];

    public function tasks(){
        return $this->HasMany(TaskCountry::class);
    }

    public function employers(){
        return $this->hasMany(Employer::class);
    }
    public function workers(){
        return $this->hasMany(Worker::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }
}
