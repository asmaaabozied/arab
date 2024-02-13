<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Task\Entities\TaskCategoryAction;

class CategoryAction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'ar_name',
        'price',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tasks(){
        return $this->hasMany(TaskCategoryAction::class);
    }

}
