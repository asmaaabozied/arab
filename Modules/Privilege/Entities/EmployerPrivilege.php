<?php

namespace Modules\Privilege\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;

class EmployerPrivilege extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_id',
        'count_of_privileges',
        'type',
        'description',
    ];
    public function employer(){
        return $this->belongsTo(Employer::class);
    }

}
