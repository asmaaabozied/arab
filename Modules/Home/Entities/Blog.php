<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blogs';
    protected $guarded = [];
    protected $appends = ['name', 'description'];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'en') ? $this->name_en : $this->name_ar;
    }// end of get name

    //
    public function getDescriptionAttribute()
    {
        return (app()->getLocale() === 'en') ? $this->description_en : $this->description_ar;
    }// end of get name

    protected static function newFactory()
    {
        return \Modules\Home\Database\factories\PageFactory::new();
    }


}
