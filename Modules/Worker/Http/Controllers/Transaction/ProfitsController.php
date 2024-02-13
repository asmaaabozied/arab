<?php

namespace Modules\Worker\Http\Controllers\Transaction;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\TaskProof;

class ProfitsController extends Controller
{
    public function index(){
        /**
        Whenever one of the proofs sent by the worker is accepted, he earns money for the task he carried out,
        and accordingly his profits will be among the accepted proofs.
         **/
        $page_name = "ArabWorkers | Worker Panel - Profits";
        $main_breadcrumb = "Financial Affairs";
        $sub_breadcrumb = "Profits";

        $data = TaskProof::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'Yes'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'NotSeenYet'],
            ['isAdminAcceptProof', 'Yes'],
        ])->orWhere([
            ['worker_id', auth()->user()->id],
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'Yes'],
        ])->with('task.category')->get();

        $array_of_accepted_profits = TaskProof::withoutTrashed()
            ->where([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'Yes'],
            ]) ->orWhere([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'NotSeenYet'],
                ['isAdminAcceptProof', 'Yes'],
            ])
            ->orWhere([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'No'],
                ['isAdminAcceptProof', 'Yes'],
            ])->get();
        if (isset($array_of_accepted_profits) and count($array_of_accepted_profits) > 0){
            for ($i=0;$i<count($array_of_accepted_profits);$i++){
                $accepted_profits [] = $array_of_accepted_profits[$i]->task->cost_per_worker;
            }
        }else{
            $accepted_profits [] = 0;
        }

        $array_of_pending_profits = TaskProof::withoutTrashed()
            ->where([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'NotSeenYet'],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ]) ->orWhere([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])
            ->orWhere([
                ['worker_id', auth()->user()->id],
                ['isEmployerAcceptProof', 'No'],
                ['isAdminAcceptProof', 'NotSeenYet'],
            ])->get();
        if (isset($array_of_pending_profits) and count($array_of_pending_profits) > 0){
            for ($i=0;$i<count($array_of_pending_profits);$i++){
                $pending_profits [] = $array_of_pending_profits[$i]->task->cost_per_worker;
            }
        }else{
            $pending_profits [] = 0;
        }


        return view('worker::layouts.transaction.profits', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'pending_profits',
            'accepted_profits',

        ]));



    }
}
