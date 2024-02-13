<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Region\Entities\City;

class TaskCity extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'city_id',
    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }


}
