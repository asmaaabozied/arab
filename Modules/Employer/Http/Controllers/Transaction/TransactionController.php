<?php

namespace Modules\Employer\Http\Controllers\Transaction;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employer\Entities\Employer;
use Modules\Setting\Entities\Status;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Task\Entities\Task;
use Modules\Transaction\Entities\EmployerTransaction;
use Modules\Worker\Entities\Worker;

class TransactionController extends Controller
{
    /**
     * The Employer's financial operations on the platform are formed by four main factors
     * 1- Recharge the wallet balance Using PayPal
     * 2- Paying for tasks
     * 3- Charging the worker's wallet
     * 4- Receiving money from the worker’s balance
     **/
    public function walletHistory()
    {
        $page_name = "ArabWorkers | Employers - Wallet History";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Wallet History";
        $transactions = [];
        /**
         * Charging the worker's wallet
         * Receiving money from the worker’s balance
         **/
        $my_employer_account = Employer::withoutTrashed()->findOrFail(auth()->user()->id);
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
            ['employer_id', auth()->user()->id],
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
            ->where('employer_id', auth()->user()->id)
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
        return view('employer::layouts.transaction.walletHistory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'paypal',
            'sortedTransactions',
        ]));
    }
}
