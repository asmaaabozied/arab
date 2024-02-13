<?php

namespace Modules\Transaction\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Worker\Entities\Worker;

class WorkerPaypalTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'worker_id',
        'payout_batch_id', //from PayPal
        'sender_batch_id', //from PayPal
        'amount_requested', //from input form
        'amount_payed', // amount paid after fees
        'paypal_fees', // from setting model
        'currency', //USD only
        'receiver_email', //worker PayPal Account
        'note', //Email Header
        'href', // link Of invoice from PayPal
    ];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
