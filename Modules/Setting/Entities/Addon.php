<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addon extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'ar_title',
        'icon',
        'fees',

    ];

}
