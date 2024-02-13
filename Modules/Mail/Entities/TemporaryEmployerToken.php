<?php

namespace Modules\Mail\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;

class TemporaryEmployerToken extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_id',
        'token',

    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }
}
