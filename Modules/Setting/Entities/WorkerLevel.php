<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class WorkerLevel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'minimum_approved_proof',
        'description',

    ];

    public function worker(){
        return $this->hasOne(Worker::class);
    }
}
