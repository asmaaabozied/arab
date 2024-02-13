<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class TaskWorker extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'worker_id',
        'is_proof_uploaded',
    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
