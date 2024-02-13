<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employer\Entities\Employer;

class EmployerTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'employer_id',
        'payment_id', //From paypal
        'payer_id', //From paypal
        'payer_email',
        'amount',
        'currency',

    ];
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
}
