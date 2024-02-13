<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeferredTask extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'main_end_date',
        'new_end_date',
        'main_total_worker_limit',
        'new_total_worker_limit',
        'reason_of_defer',
        'duration_of_defer',
    ];

    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
