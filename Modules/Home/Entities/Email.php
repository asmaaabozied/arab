<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'emails';
    protected $guarded = [];



    protected static function newFactory()
    {
        return \Modules\Home\Database\factories\PageFactory::new();
    }


}
