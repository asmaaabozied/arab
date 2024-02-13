<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketStatus extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'icon',
        'color',

    ];
    public function employer_tickets(){
        return $this->hasMany(EmployerTicket::class);
    }

}
