<?php

namespace Modules\Currency\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportedCurrencyCode extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'currency_name',
        'currency_code'
    ];

}
