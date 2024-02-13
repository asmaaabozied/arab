<?php

namespace Modules\Admin\Http\Controllers\Task;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskParticipant;

class AdminTaskProofController extends Controller
{
    public function proofDetails(Task $task, TaskParticipant $proof){
        return view('admin.proofs.proofDetails', compact('proof'));
    }

/**
 * here was functions for accepted or rejected or pended task proof status for worker
 * im moved this functions into AdminWorkersController  Because this section it must  contain a function for changed tusk proof status when Admin changed from task details
 */

}
