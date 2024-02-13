<?php

namespace Modules\DiscountCode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;
use Modules\Task\Entities\Task;

class EmployerTaskDiscountCode extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_id',
        'task_id',
        'discount_code_id',

    ];
    public function discountCode(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DiscountCode::class);
    }
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function task(){
        return $this->belongsTo(Task::class);
    }

}
