<?php

namespace Modules\Admin\Http\Controllers\Worker;

use App\Mail\ChangeUserStatus;
use App\Mail\ChangeWorkerStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Http\Requests\RejectTaskProofRequest;
use Modules\Employer\Entities\Employer;
use Modules\Mail\Entities\Email;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Setting\Entities\WorkerLevel;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskParticipant;
use Modules\Task\Entities\TaskProof;
use Modules\Transaction\Entities\WorkerPaypalTransaction;
use Modules\Worker\Entities\Worker;

class AdminWorkersController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers|Admin - Workers";
        $main_breadcrumb = "Workers";
        $sub_breadcrumb = "Workers";
        $workers = Worker::withoutTrashed()->with(['level', 'country', 'city'])->get();
//        dd($workers);
        return view('admin::layouts.worker.index', compact([
            'workers',
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
        ]));
    }

    public function workerProfile(Worker $worker)
    {
        $page_name = "ArabWorkers|Admin - Workers - Profile";
        $main_breadcrumb = "Workers";
        $sub_breadcrumb = "Profile";
//        dd($worker->proofs()->get());
        $accepted_proofs = $worker->proofs()->where([
            ['isEmployerAcceptProof', 'Yes'],
            ['isAdminAcceptProof', 'Yes'],
        ])->count();
        $rejected_proofs = $worker->proofs()->where([
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'No'],
        ])->orwhere([
            ['isEmployerAcceptProof', 'No'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->count();

        $pending_proofs = $worker->proofs()->where([
            ['isEmployerAcceptProof', 'NotSeenYet'],
            ['isAdminAcceptProof', 'NotSeenYet'],
        ])->count();
        $proofs = $worker->proofs()->with(['task', 'worker'])->get();

//        dd($proofs);
        return view('admin::layouts.worker.profile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'worker',
            'accepted_proofs',
            'rejected_proofs',
            'pending_proofs',
            'proofs',

        ]));
    }


    public function proofDetails(TaskProof $proof)
    {
        $page_name = "ArabWorkers|Admin - Workers - Profile - Proof";
        $main_breadcrumb = "Worker Profile /Worker Proofs";
        $sub_breadcrumb = "Proof";
        return view('admin::layouts.worker.taskProofDetails', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'proof',
        ]));
    }


    public function approveTaskProf(TaskProof $proof, $worker)
    {
        if ($proof->isAdminAcceptProof == "NotSeenYet" and $proof->worker_id == $worker) {
            $proof->update([
                'isAdminAcceptProof' => 'Yes',
            ]);
            alert()->toast(trans('admin::workers.The Prof has been accepted successfully'), 'success');
            return redirect()->route('admin.show.worker.profile', $worker);

        } else {
            alert()->toast(trans('admin::workers.An error occurred while accepting the proof. Please try again later'), 'error');
            return redirect()->route('admin.show.worker.profile', $worker);
        }
    }

    public function rejectTaskProf(RejectTaskProofRequest $request, TaskProof $proof, $worker)
    {
        $validated = $request->validated();
        if ($proof->isAdminAcceptProof == "NotSeenYet" and $proof->worker_id == $worker) {
            $proof->update([
                'isAdminAcceptProof' => 'No',
                'reasonOfAdminRefuse' => $validated['reasonOfReject'],
            ]);
            alert()->toast(trans('admin::workers.The admin has been rejected successfully'), 'success');
            return redirect()->route('admin.show.worker.profile', $worker);
        } else {
            alert()->toast(trans('admin::workers.An error occurred while rejecting the proof. Please try again later'), 'error');
            return redirect()->route('admin.show.worker.profile', $worker);
        }

    }


//todo active cronjob to active worker after requested days
    public function enabledWorker(Worker $worker)
    {
        $worker->update([
            'status' => 'enable',
            'suspend_days' => 0,
            'suspend_start_date' => null,
        ]);
        $worker_email = $worker->email;

        //Send mail
        $worker_status_data = [
            'name' => $worker->name,
            'status' => "enable",
        ];
//        Mail::to("mohammadalizamp9@gmail.com")->send(new ChangeWorkerStatus($worker_status_data));

//        $new_email = Email::create([
//            'subject' => 'User Status Changed',
//            'from' => env('MAIL_FROM_ADDRESS'),
//            'to' => $worker_email
//        ]);
        alert()->toast(trans('admin::workers.The worker status has been enabled successfully, and he will receive an email informing him of his new status'), 'success');
        return redirect()->route('admin.show.workers');
    }

    public function disabledWorker(Worker $worker, $days)
    {
        $worker->update([
            'status' => 'disable',
            'suspend_start_date' => Carbon::now()->format('Y-m-d'),
            'suspend_days' => $days,


        ]);
        $privilege = Privilege::withoutTrashed()->where([
            ['code', 'SAP'],
            ['for', 'dual'],
        ])->first();
        WorkerPrivilege::create([
            'worker_id' =>  $worker->id,
            'count_of_privileges' => $privilege->privileges,
            'type' => $privilege->type,
            'description' => $privilege->title,
        ]);


        $worker_email = $worker->email;
        //Send mail
        $worker_status_data = [
            'name' => $worker->name,
            'status' => "disable",
        ];
//        Mail::to("$worker_email")->send(new ChangeWorkerStatus($worker_status_data));

//        $new_email = Email::create([
//            'subject' => 'User Status Changed',
//            'from_email' => env('MAIL_FROM_ADDRESS'),
//            'to_email' => $worker_email
//        ]);
        alert()->toast(trans('admin::workers.The worker status has been disabled successfully, and he will receive an email informing him of his new status'), 'success');
        return redirect()->route('admin.show.workers');
    }


    public function workerTransactions($worker_id)
    {
        $page_name = "ArabWorkers|Admin - Workers - Transactions Details";
        $main_breadcrumb = "Worker  - Transactions Details";
        $sub_breadcrumb = "Transactions Details";
        $transactions = [];
        /**
         * Send Money to employer wallet
         * Receiving money from the employer’s balance
         **/
        $my_worker_account = Worker::withoutTrashed()->findOrFail($worker_id);
        $check_dual_account = Employer::withoutTrashed()->where([
            ['email', $my_worker_account->email],
            ['country_id', $my_worker_account->country_id],
            ['city_id', $my_worker_account->city_id],
            ['phone', $my_worker_account->phone],
        ])->first();
        if (isset($check_dual_account)) {
            $array_of_send_amount_to_employer = AccountSwitchOperation::withoutTrashed()
                ->where([
                    ['worker_id', $my_worker_account->id],
                    ['employer_id', $check_dual_account->id],
                    ['from', 'worker'],
                    ['to', 'employer'],
                    ['isTransferWalletBalance', 'true']
                ])->get();

            $array_of_receive_amount_from_employer = AccountSwitchOperation::withoutTrashed()
                ->where([
                    ['worker_id', $my_worker_account->id],
                    ['employer_id', $check_dual_account->id],
                    ['from', 'employer'],
                    ['to', 'worker'],
                    ['isTransferWalletBalance', 'true']
                ])->get();
        } else {
            $array_of_send_amount_to_employer = null;
            $array_of_receive_amount_from_employer = null;
        }

        if ($array_of_send_amount_to_employer != null) {
            for ($i = 0; $i < count($array_of_send_amount_to_employer); $i++) {
                $transactions [] = [
                    'type_of_pay' => 'Withdraw',
                    'amount' => $array_of_send_amount_to_employer[$i]->transferred_amount,
                    'amount_transaction' => 'SendAmountToEmployerWallet',
                    'payed_at' => $array_of_send_amount_to_employer[$i]->created_at,
                ];
            }
        }
        if ($array_of_receive_amount_from_employer != null) {
            for ($i = 0; $i < count($array_of_receive_amount_from_employer); $i++) {
                $transactions [] = [
                    'type_of_pay' => 'Deposit',
                    'amount' => $array_of_receive_amount_from_employer[$i]->transferred_amount,
                    'amount_transaction' => 'ReceiveAmountFromEmployerWallet',
                    'payed_at' => $array_of_receive_amount_from_employer[$i]->created_at,
                ];
            }
        }
        /**
         *  Profits  for Done tasks
         **/
        $array_of_accepted_profits = TaskProof::withoutTrashed()
            ->where([
                ['worker_id', $worker_id],
                ['isEmployerAcceptProof', 'Yes'],
                ['isAdminAcceptProof', 'Yes'],
            ]) ->orWhere([
                ['worker_id', $worker_id],
                ['isEmployerAcceptProof', 'NotSeenYet'],
                ['isAdminAcceptProof', 'Yes'],
            ])
            ->orWhere([
                ['worker_id', $worker_id],
                ['isEmployerAcceptProof', 'No'],
                ['isAdminAcceptProof', 'Yes'],
            ])->get();

        if (isset($array_of_accepted_profits) and count($array_of_accepted_profits) > 0){
            for ($i=0;$i<count($array_of_accepted_profits);$i++){
                $accepted_profits [] = [
                    'amount' => $array_of_accepted_profits[$i]->task->cost_per_worker,
                    'approved_at' => $array_of_accepted_profits[$i]->task->updated_at,

                ];
            }
        }else{
            $accepted_profits [] = 0;
        }

        if ($accepted_profits != null and $accepted_profits[0]!=0) {
            for ($i = 0; $i < count($accepted_profits); $i++) {
                $transactions [] = [
                    'type_of_pay' => 'Deposit',
                    'amount' => $accepted_profits[$i]['amount'],
                    'amount_transaction' => 'ProfitsFromDoneAndAcceptedProfs',
                    'payed_at' => $accepted_profits[$i]['approved_at'],
                ];
            }
        }

        /**
         * payout wallet balance To PayPal Account
         **/
        $payouts = WorkerPaypalTransaction::withoutTrashed()
            ->where('worker_id', $worker_id)
            ->get();
        for ($i = 0; $i < count($payouts); $i++) {
            $transactions [] = [
                'type_of_pay' => 'Withdraw',
                'amount' => $payouts[$i]->amount_requested,
                'amount_transaction' => 'PayOutBalanceUsePaypal',
                'payed_at' => $payouts[$i]->created_at,
            ];
        }
        $sortedTransactions = collect($transactions)->sortByDesc('payed_at')->values();

        return view('admin::layouts.worker.transactions', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'sortedTransactions',
            'my_worker_account',
        ]));
    }

}
