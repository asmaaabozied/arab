<?php

namespace Modules\Privilege\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class WorkerPrivilege extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'worker_id',
        'count_of_privileges',
        'type',
        'description',
    ];
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
