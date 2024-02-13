<?php

namespace Modules\Support\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportSection extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'icon',
        'ar_name',
        'en_name',
        'en_description',
        'ar_description',
    ];
    public function employer_tickets(){
        return $this->hasMany(EmployerTicket::class);
    }
    public function worker_tickets(){
        return $this->hasMany(WorkerTicket::class);
    }

}
