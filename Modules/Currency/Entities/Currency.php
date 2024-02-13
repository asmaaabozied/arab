<?php

namespace Modules\Currency\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'en_name',
        'ar_name',
        'rate',
        'icon',
        'is_default',
    ];


}
