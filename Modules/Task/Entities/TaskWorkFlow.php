<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskWorkFlow extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'work_flow',

    ];
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
