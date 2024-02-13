<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;

class EmployerTicket extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'ticket_number',
        'employer_id',
        'support_section_id',
        'subject',
        'description',
        'attached_files',
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function support_section(){
        return $this->belongsTo(SupportSection::class);
    }
    public function statuses(){
        return $this->hasMany(EmployerTicketStatuses::class);
    }
    public function answers(){
        return $this->hasMany(EmployerTicketAnswer::class);
    }
}
