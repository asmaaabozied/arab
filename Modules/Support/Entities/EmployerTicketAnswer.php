<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Entities\Admin;

class EmployerTicketAnswer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_ticket_id',
        'admin_id',
        'admin_answer',
        'admin_attached_file',
        'admin_answered_at',
        'employer_answer',
        'employer_attached_file',
        'employer_answered_at',
    ];
    public function employer_ticket(){
        return $this->belongsTo(EmployerTicket::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

}
