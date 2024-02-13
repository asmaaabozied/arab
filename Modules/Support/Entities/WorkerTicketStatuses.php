<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkerTicketStatuses extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'worker_ticket_id',
        'ticket_status_id',
    ];

    public function ticket(){
        return $this->belongsTo(WorkerTicket::class);
    }
    public function name(){
        return $this->belongsTo(TicketStatus::class,'ticket_status_id');
    }
}
