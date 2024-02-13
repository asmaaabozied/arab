<?php

namespace Modules\SwitchAccount\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;
use Modules\Worker\Entities\Worker;

class AccountSwitchOperation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'from',
        'to',
        'employer_id',
        'worker_id',
        'isTransferWalletBalance',
        'transferred_amount',
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
