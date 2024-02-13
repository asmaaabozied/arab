<?php

namespace Modules\Region\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;
use Modules\Task\Entities\TaskCity;
use Modules\Worker\Entities\Worker;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'ar_name',
        'country_id',
        'min_city_cost',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function tasks()
    {
        return $this->HasMany(TaskCity::class);
    }

    public function employers()
    {
        return $this->HasMany(Employer::class,'city_id');
    }

    public function workers()
    {
        return $this->HasMany(Worker::class,'city_id');
    }
}
