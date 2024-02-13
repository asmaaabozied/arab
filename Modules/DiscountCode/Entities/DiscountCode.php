<?php

namespace Modules\DiscountCode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountCode extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'max_uses',
        'count_of_uses',
        'discount_amount',
        'starts_at',
        'expires_at',
        'description',
    ];
    public function employer_task_discount_codes(){
        return $this->hasMany(EmployerTaskDiscountCode::class, 'discount_code_id');
    }

}
