<?php

namespace Modules\Mail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class TemporaryWorkerToken extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'worker_id',
        'token',
    ];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }


}
