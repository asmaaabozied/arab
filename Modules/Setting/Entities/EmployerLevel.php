<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;

class EmployerLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'minimum_spend',
        'minimum_task',
        'description',
    ];

    public function employer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employer::class);
    }
}
