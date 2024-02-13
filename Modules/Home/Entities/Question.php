<?php

namespace Modules\Home\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='questions';
    protected $guarded = [];

    protected $appends = ['question', 'reply'];

    public function getQuestionAttribute()
    {
        return (app()->getLocale() === 'en') ? $this->question_en : $this->question_ar;
    }// end of get name

    //
    public function getReplyAttribute()
    {
        return (app()->getLocale() === 'en') ? $this->reply_en : $this->reply_ar;
    }// end of get name

    protected static function newFactory()
    {
        return \Modules\Home\Database\factories\QuestionFactory::new();
    }
}
