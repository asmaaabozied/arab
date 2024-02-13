<?php

namespace Modules\Admin\Http\Controllers\Employer;

use App\Mail\ChangeUserStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Employer\Entities\Employer;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Privilege\Entities\Privilege;
use Modules\Region\Entities\City;
use Modules\Setting\Entities\EmployerLevel;
use Modules\Setting\Entities\Status;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Task\Entities\Task;
use Modules\Transaction\Entities\EmployerTransaction;
use Modules\Worker\Entities\Worker;

class AdminEmployerController extends Controller
{
    public function index()
    {

        $page_name = "ArabWorkers|Admin - Employers";
        $main_breadcrumb = "Employers";
        $sub_breadcrumb = "Employers";
        $employers = Employer::withoutTrashed()->with(['level', 'country', 'city'])->get();
        return view('admin::layouts.employer.index', compact([
            'employers',
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
        ]));
    }


//todo fix email host from serve
    public function enabledEmployer(Employer $employer)
    {

        $employer->update([
            'status' => 'enable',
            'suspend_days' => 0,
            'suspend_start_date' => null,
        ]);
        $employer_email = $employer->email;

        //Send mail
        $employer_status_data = [
            'name' => $employer->name,
            'status' => "enable",
        ];
//        Mail::to("mohammadalizamp9@gmail.com")->send(new ChangeEmployerStatus($employer_status_data));

//        $new_email = Email::create([
//            'subject' => 'User Status Changed',
//            'from' => env('MAIL_FROM_ADDRESS'),
//            'to' => $employer_email
//        ]);
        alert()->toast(trans('admin::employer.The employer status has been enabled successfully, and he will receive an email informing him of his new status'), 'success');
        return redirect()->route('admin.show.employers');
    }

    public function disabledEmployer(Employer $employer, $days)
    {
        $employer->update([
            'status' => 'disable',
            'suspend_start_date' => Carbon::now()->format('Y-m-d'),
            'suspend_days' => $days,
        ]);

        $privilege = Privilege::withoutTrashed()->where([
            ['code', 'SAP'],
            ['for', 'dual'],
        ])->first();
        EmployerPrivilege::create([
            'employer_id' =>  $employer->id,
            'count_of_privileges' => $privilege->privileges,
            'type' => $privilege->type,
            'description' => $privilege->title,
        ]);


        $worker_email = $employer->email;
        //Send mail
        $worker_status_data = [
            'name' => $employer->name,
            'status' => "disable",
        ];
//        Mail::to("$employer_email")->send(new ChangeWorkerStatus($employer_status_data));

//        $new_email = Email::create([
//            'subject' => 'User Status Changed',
//            'from_email' => env('MAIL_FROM_ADDRESS'),
//            'to_email' => $employer_email
//        ]);
        alert()->toast(trans('admin::employer.The employer status has been disabled successfully, and he will receive an email informing him of his new status'), 'success');
        return redirect()->route('admin.show.employers');
    }


    public function employerProfile(Employer $employer)
    {
        $page_name = "ArabWorkers|Admin - Employers - Profile";
        $main_breadcrumb = "Employers";
        $sub_breadcrumb = "Profile";
        $total_spend = $employer->total_spends;
        $status = Status::withoutTrashed()->get();
        $unPayed = $status->where('name', 'unPayed')->first();
        $pending = $status->where('name', 'pending')->first();
        $active = $status->where('name', 'active')->first();
        $complete = $status->where('name', 'completed')->first();
        $adminRefusalTask = $status->where('name', 'adminRefusalTask')->first();
        /** NotPublished **/
        $count_NotPublished_tasks = Task::withoutTrashed()->where([
            ['publish_status', 'NotPublished'],
            ['employer_id', $employer->id],
        ])->count();

        $data = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
            ['employer_id', $employer->id],
        ])->with('TaskStatuses.status')->get();
//        dd($data);
        for ($i = 0; $i < count($data); $i++) {
            /** unPayed **/
            if (count($data[$i]->TaskStatuses) == 1 and $data[$i]->TaskStatuses[0]->task_status_id == $unPayed->id) {
                $array_of_unPayed_task [] = $data[$i];
            }
            /** Pending **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $pending->name) {
                $array_of_pending_tasks [] = $data[$i];
            }
            /** Active **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name) {
                $array_of_active_tasks [] = $data[$i];
            }
            /** Complete **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name) {
                $array_of_completed_tasks [] = $data[$i];
            }
            /** adminRefusalTask **/
            if ($data[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $adminRefusalTask->name) {
                $array_of_rejected_tasks [] = $data[$i];
            }

        }
        /** unPayed **/
        if (isset($array_of_unPayed_task)) {
            $unPayedTasks = $array_of_unPayed_task;
        } else {
            $unPayedTasks = [];
        }
        /** Pending **/
        if (isset($array_of_pending_tasks)) {
            $pendingTasks = $array_of_pending_tasks;
        } else {
            $pendingTasks = [];
        }
        /** Active **/
        if (isset($array_of_active_tasks)) {
            $activeTasks = $array_of_active_tasks;
        } else {
            $activeTasks = [];
        }
        /** Complete **/
        if (isset($array_of_completed_tasks)) {
            $completeTasks = $array_of_completed_tasks;
        } else {
            $completeTasks = [];
        }
        /** adminRefusalTask **/
        if (isset($array_of_rejected_tasks)) {
            $rejectedTasks = $array_of_rejected_tasks;
        } else {
            $rejectedTasks = [];
        }
        $tasks = $employer->tasks()->with(['category','TaskStatuses.status'])->get();

        return view('admin::layouts.employer.profile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'total_spend',
            'tasks',
            'employer',
            'unPayedTasks',
            'pendingTasks',
            'activeTasks',
            'completeTasks',
            'rejectedTasks',
            'count_NotPublished_tasks',
        ]));
    }

    public function taskDetails(Employer $employer, $task){
        $page_name = "ArabWorkers|Admin - Employers - TaskDetails";
        $main_breadcrumb = "Employers";
        $sub_breadcrumb = "TaskDetails";
        $task = $employer->tasks()->with(['employer','proofs'])->findOrFail($task);
//        dd($task);
        $app_local = app()->getLocale();

        for ($i = 0; $i < count($task->countries); $i++) {
            $country [$task->countries[$i]->country_id] = City::withoutTrashed()->where('country_id', $task->countries[$i]->country_id)->count();
        }

        for ($i = 0; $i < count($task->countries); $i++) {
            for ($j = 0; $j < count($task->cities); $j++) {
                if ($task->cities[$j]->city->country_id == $task->countries[$i]->country_id)
                    $region [$task->countries[$i]->country_id] [] = $task->cities[$j]->city->id;
            }
        }
        $keys = array_keys($country);
        for ($i = 0; $i < count($keys); $i++) {
            if (count($region[$keys[$i]]) == $country[$keys[$i]]) {
                if ($app_local == "ar") {
                    $result [] = [
                        'country' => $task->countries[$i]->country->ar_name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => 'all_cities'
                    ];
                } else {
                    $result [] = [
                        'country' => $task->countries[$i]->country->name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => 'all_cities'
                    ];
                }


            } else {
                if ($app_local == "ar") {
                    $result [] = [
                        'country' => $task->countries[$i]->country->ar_name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => $region[$keys[$i]],
                    ];
                } else {
                    $result [] = [
                        'country' => $task->countries[$i]->country->name,
                        'flag' => $task->countries[$i]->country->flag,
                        'cities' => $region[$keys[$i]],
                    ];
                }

            }
        }
        return view('admin::layouts.employer.taskDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'task',
            'result',
            'app_local',
        ]));

    }



    public function employerTransactions($employer_id){
        $page_name = "ArabWorkers|Admin - Employer - Transactions Details";
        $main_breadcrumb = "Employers";
        $sub_breadcrumb = "Employer Transaction";
        $transactions = [];
        /**
         * Charging the worker's wallet
         * Receiving money from the worker’s balance
         **/
        $my_employer_account = Employer::withoutTrashed()->findOrFail($employer_id);
        $check_dual_account = Worker::withoutTrashed()->where([
            ['email', $my_employer_account->email],
            ['country_id', $my_employer_account->country_id],
            ['city_id', $my_employer_account->city_id],
            ['phone', $my_employer_account->phone],
        ])->first();
        if (isset($check_dual_account)) {
            $array_of_send_amount_to_worker = AccountSwitchOperation::withoutTrashed()
                ->where([
                    ['employer_id', $my_employer_account->id],
                    ['worker_id', $check_dual_account->id],
                    ['from', 'employer'],
                    ['to', 'worker'],
                    ['isTransferWalletBalance', 'true']
                ])->get();

            $array_of_receive_amount_from_worker = AccountSwitchOperation::withoutTrashed()
                ->where([
                    ['employer_id', $my_employer_account->id],
                    ['worker_id', $check_dual_account->id],
                    ['from', 'worker'],
                    ['to', 'employer'],
                    ['isTransferWalletBalance', 'true']
                ])->get();
        } else {
            $array_of_send_amount_to_worker = null;
            $array_of_receive_amount_from_worker = null;
        }
        if ($array_of_send_amount_to_worker != null) {
            for ($i = 0; $i < count($array_of_send_amount_to_worker); $i++) {
                $transactions [] = [
                    'type_of_pay' => 'Withdraw',
                    'amount' => $array_of_send_amount_to_worker[$i]->transferred_amount,
                    'amount_transaction' => 'SendAmountToWorkerWallet',
                    'payed_at' => $array_of_send_amount_to_worker[$i]->created_at,
                ];
            }
        }
        if ($array_of_receive_amount_from_worker != null) {
            for ($i = 0; $i < count($array_of_receive_amount_from_worker); $i++) {
                $transactions [] = [
                    'type_of_pay' => 'Deposit',
                    'amount' => $array_of_receive_amount_from_worker[$i]->transferred_amount,
                    'amount_transaction' => 'ReceiveAmountFromWorkerWallet',
                    'payed_at' => $array_of_receive_amount_from_worker[$i]->created_at,
                ];
            }
        }

        /**
         * Paying for tasks
         **/
        $array_of_tasks = Task::withoutTrashed()->where([
            ['employer_id', $employer_id],
            ['publish_status', 'Published'],
        ])->with('category', 'TaskStatuses.status', 'taskDiscounted.discountCode')->get();
        $active = Status::withoutTrashed()->where('name', 'active')->first();
        $complete = Status::withoutTrashed()->where('name', 'completed')->first();
        for ($i = 0; $i < count($array_of_tasks); $i++) {
            if (
                $array_of_tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $active->name
                or
                $array_of_tasks[$i]->TaskStatuses()->with('status')->latest()->first()->status->name == $complete->name

            ) {
                $transactions [] = [
                    'type_of_pay' => 'Withdraw',
                    'amount' => $array_of_tasks[$i]->total_cost,
                    'amount_transaction' => 'PayTasksPrices',
                    'payed_at' => $array_of_tasks[$i]->updated_at,
                ];
            }
        }


        /**
         * Recharge the wallet balance Using PayPal
         **/
        $paypal = EmployerTransaction::withoutTrashed()
            ->where('employer_id', $employer_id)
            ->get();

        for ($i = 0; $i < count($paypal); $i++) {
            $transactions [] = [
                'type_of_pay' => 'Deposit',
                'amount' => $paypal[$i]->amount,
                'amount_transaction' => 'ChargeWalletUsePaypal',
                'payed_at' => $paypal[$i]->created_at,
            ];
        }
        $sortedTransactions = collect($transactions)->sortByDesc('payed_at')->values();
        return view('admin::layouts.employer.transactions', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'paypal',
            'sortedTransactions',
            'my_employer_account',
        ]));

    }
}
