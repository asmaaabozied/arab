<?php

namespace Modules\Privilege\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilege extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'code',
        'privileges',
        'type',
        'for',

    ];
}
