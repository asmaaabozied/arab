<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\CategoryAction;

class TaskCategoryAction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'task_id',
        'category_action_id',

    ];

    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function categoryAction(){
        return $this->belongsTo(CategoryAction::class);
    }
}
