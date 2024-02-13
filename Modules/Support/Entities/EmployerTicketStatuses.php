<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployerTicketStatuses extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_ticket_id',
        'ticket_status_id',

    ];

    public function ticket(){
        return $this->belongsTo(EmployerTicket::class);
    }
    public function name(){
        return $this->belongsTo(TicketStatus::class,'ticket_status_id');
    }

}
