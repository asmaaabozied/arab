<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_site_logo',
        'dashboard_site_logo',
        'min_withdraw_limit',
        'fees_per_transfer_wallet_balance',
        'fees_per_withdraw_wallet_using_paypal',
        'fees_per_charge_wallet_using_paypal',
        'days_added_to_task_end_date_when_reject_task_proof',
        'pin_in_top_task_limit_count',
        'exchange_rate_api_key',
    ];
}
