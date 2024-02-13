<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\Category;
use Modules\DiscountCode\Entities\EmployerTaskDiscountCode;
use Modules\Employer\Entities\Employer;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_number',
        'category_id',
        'title',
        'description',
        'employer_id',
        'proof_request_ques', //must be text or false
        'proof_request_screenShot', //must be text or false
        'total_worker_limit', //must be number
        'approved_workers', //must be number default 0
        'cost_per_worker',
        'task_end_date',
        'special_access', //must be true or false
        'only_professional', // must be true or false
        'daily_limit', // must be number or false
        'task_cost',
        'other_cost',
        'total_cost',
        'publish_status',
        'is_hidden',// must be true or false (by default is false) !!This option is for the employer to be able to hide and show the task according to his desire, in order to avoid blocking social media platforms in the event that the required activity on social media platforms is sensitive to the number of successive events such as commenting, liking, sharing ... etc.
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function countries()
    {
        return $this->hasMany(TaskCountry::class);
    }

    public function cities()
    {
        return $this->hasMany(TaskCity::class);
    }

    public function actions()
    {
        return $this->hasMany(TaskCategoryAction::class);
    }

    public function workflows(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TaskWorkFlow::class);
    }

    public function TaskStatuses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TaskStatus::class);
    }

    public function employer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function proofs()
    {
        return $this->hasMany(TaskProof::class);
    }

    public function taskDiscounted()
    {
        return $this->hasOne(EmployerTaskDiscountCode::class);
    }

    public function deferred()
    {
        return $this->hasMany(DeferredTask::class,'task_id');
    }
    public function workers(){
        return $this->HasMany(TaskWorker::class);
    }

}
