<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Admin;

class WorkerTicketAnswer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'worker_ticket_id',
        'admin_id',
        'admin_answer',
        'admin_attached_file',
        'admin_answered_at',
        'worker_answer',
        'worker_attached_file',
        'worker_answered_at',
    ];
    public function worker_ticket(){
        return $this->belongsTo(WorkerTicket::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
