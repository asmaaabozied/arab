<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class WorkerTicket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'ticket_number',
        'worker_id',
        'support_section_id',
        'subject',
        'description',
        'attached_files',

    ];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }
    public function support_section(){
        return $this->belongsTo(SupportSection::class);
    }
    public function statuses(){
        return $this->hasMany(WorkerTicketStatuses::class);
    }
    public function answers(){
        return $this->hasMany(WorkerTicketAnswer::class);
    }
}
