<?php

namespace Modules\Worker\Http\Controllers\Privilege;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;

class PrivilegeController extends Controller
{
    public function ruleOfPrivilege(){
        $page_name = "ArabWorkers | Worker - management section - RuleOfPrivileges";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "RuleOfPrivileges";
        $data = Privilege::withoutTrashed()->where([
            ['for','worker']
        ])->orWhere([
            ['for','dual']
        ])->get();
        return view('worker::layouts.privilege.ruleOfPrivileges', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));

    }
    public function showPrivilegeHistory()
    {
        $page_name = "ArabWorkers | Worker - management section - PrivilegeHistory";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "PrivilegeHistory";
        $data = WorkerPrivilege::withoutTrashed()->where([
            ['worker_id', auth()->user()->id],
        ])->orderByDesc('created_at')->get();
        if ($data->count()>0){
            for($i=0;$i<count($data);$i++){
                if ($data[$i]->type == "plus") {
                    $plus [] = $data[$i]->count_of_privileges;
                    $total[] = "+" . $data[$i]->count_of_privileges;
                    $minus [] = 0;
                }
                else{
                    $minus [] =$data[$i]->count_of_privileges;
                    $total[] = "-" . $data[$i]->count_of_privileges;
                    $plus [] = 0;
                }
            }
        }else{
            $plus [] = 0;
            $total [] = 0;
            $minus [] = 0;
        }
        return view('worker::layouts.privilege.privilegeHistory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'plus',
            'total',
            'minus',
        ]));
    }
}
