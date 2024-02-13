<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;
use Modules\Worker\Entities\Worker;

class TaskProof extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'worker_id',
        'employer_id',
        'screenshot',
        'answer_text',
        'description',
        'isEmployerAcceptProof',
        'isAdminAcceptProof',
        'reasonOfEmployerRefuse',
        'reasonOfAdminRefuse',


    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
}
