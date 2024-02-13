<?php

namespace Modules\Admin\Http\Controllers\Privilege;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Worker\Entities\Worker;

class WorkerPrivilegeController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers|Admin - WorkersPrivileges";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "WorkersPrivileges";

        $data = Worker::withoutTrashed()->with('level','privileges')->select('id','name','worker_level_id','wallet_balance','total_earns')->get();
        if (count($data)>0){
            for ($i=0;$i<count($data);$i++){
                if ($data[$i]->privileges->count()>0){
                    for ($j=0;$j<count($data[$i]->privileges);$j++){
                        if ($data[$i]->privileges[$j]->type == "plus") {
                            $array_of_plus [$i][] =$data[$i]->privileges[$j]->count_of_privileges;
                            $array_of_privileges[$i][$j]  = "+" . $data[$i]->privileges[$j]->count_of_privileges;
                            $array_of_minus [$i][] =0;
                        }
                        else{
                            $array_of_minus [$i][] =$data[$i]->privileges[$j]->count_of_privileges;;
                            $array_of_plus [$i][] =0;
                            $array_of_privileges[$i][$j]  = "-" . $data[$i]->privileges[$j]->count_of_privileges;
                        }

                    }

                }else{
                    $array_of_privileges[][] = 0;
                    $array_of_minus[][] = 0;
                    $array_of_plus[][] = 0;
                }

            }
        }else{
            $array_of_privileges[][] = 0;
            $array_of_minus[][] = 0;
            $array_of_plus[][] = 0;
        }


        return view('admin::layouts.privilege.workers.index', compact(
            [
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'data',
                'array_of_plus',
                'array_of_minus',
                'array_of_privileges',
            ]
        ));


    }

    public function showWorkerPrivilegesHistory($worker)
    {
        $page_name = "ArabWorkers|Admin - WorkersPrivileges - History";
        $main_breadcrumb = "WorkersPrivileges - management section";
        $sub_breadcrumb = "PrivilegeHistory";

        $worker = Worker::withoutTrashed()->findOrFail($worker);
        $data = WorkerPrivilege::withoutTrashed()->where([
            ['worker_id', $worker->id],
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
        return view('admin::layouts.privilege.workers.privilegeHistory', compact([
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
