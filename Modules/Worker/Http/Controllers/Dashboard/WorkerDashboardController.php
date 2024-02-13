<?php

namespace Modules\Worker\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Task\Entities\TaskProof;
use Modules\Task\Entities\TaskWorker;

class WorkerDashboardController extends Controller
{
    protected function guard()
    {
        return Auth::guard('worker');
    }

    public function index()
    {
        $page_name = "ArabWorkers | Worker Panel";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Worker Panel";
        $activeTasks = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'false'],
        ])->count();

        $finishTasks = TaskWorker::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['is_proof_uploaded', 'true'],
        ])->count();

        $acceptedTasks = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'Yes'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'No'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->count();

        $rejectedTask = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'No'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->count();
//        dd(
//            $activeTasks,
//            $finishTasks,
//            $acceptedTasks,
//            $rejectedTask
//        );
        return view('worker::layouts.worker.index', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'activeTasks',
            'finishTasks',
            'acceptedTasks',
            'rejectedTask',
        ]));

    }
    public function getCurrentLang()
    {
        $current_lange = Session::get('applocale');
        if ($current_lange != null) {
            $lang = $current_lange;
        } else {
            $lang = "ar";
        }

        return $lang;
    }

    public function logout(Request $request)
    {
        $lang = $this->getCurrentLang();
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::put('applocale', $lang);
        return redirect()->route('show.login.form');
    }
}
