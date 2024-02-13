<?php

namespace Modules\Employer\Http\Controllers\Privilege;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Privilege\Entities\Privilege;

class PrivilegeController extends Controller
{
    public function ruleOfPrivilege(){
        $page_name = "ArabWorkers | Employer - management section - RuleOfPrivileges";
        $main_breadcrumb = "management section";
        $sub_breadcrumb = "RuleOfPrivileges";
        $data = Privilege::withoutTrashed()->where([
            ['for','employer']
        ])->orWhere([
            ['for','dual']
        ])->get();
        return view('employer::layouts.privilege.ruleOfPrivileges', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));

    }
    public function showPrivilegeHistory()
    {
        $page_name = "ArabWorkers | Employer - management section - PrivilegeHistory";
        $main_breadcrumb = "management section";
        $sub_breadcrumb = "PrivilegeHistory";
        $data = EmployerPrivilege::withoutTrashed()->where([
            ['employer_id', auth()->user()->id],
        ])->orderByDesc('created_at')->get();
        if ($data->count()>0){
            for($i=0;$i<count($data);$i++){
                if ($data[$i]->type == "plus") {
                    $plus [] = $data[$i]->count_of_privileges;
                    $total[] = "+" . $data[$i]->count_of_privileges;
                    $minus [] = 0;
                }
                else{
                    $minus [] = $data[$i]->count_of_privileges;
                    $total[] = "-" . $data[$i]->count_of_privileges;
                    $plus [] = 0;
                }
            }

        } else{
            $plus [] = 0;
            $total [] = 0;
            $minus [] = 0;
        }


        return view('employer::layouts.privilege.privilegeHistory', compact([
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
