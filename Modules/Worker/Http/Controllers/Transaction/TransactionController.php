<?php

namespace Modules\Worker\Http\Controllers\Transaction;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employer\Entities\Employer;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Task\Entities\TaskProof;
use Modules\Transaction\Entities\WorkerPaypalTransaction;
use Modules\Worker\Entities\Worker;

class TransactionController extends Controller
{
    /**
     * The Worker's financial operations on the platform are formed by four main factors
     * 1- payout wallet balance To PayPal Account
     * 2- Profits  for Done tasks
     * 3- Send Money to employer wallet
     * 4- Receiving money from the employer’s balance
     **/
    public function walletHistory()
    {
        $page_name = "ArabWorkers | Worker - Wallet History";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Wallet History";
        $transactions = [];
        /**
         * Send Money to employer wallet
         * Receiving money from the employer’s balance
         **/
        $my_worker_account = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
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
            ->where('worker_id', auth()->user()->id)
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

        return view('worker::layouts.transaction.walletHistory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'sortedTransactions',
        ]));
    }
}
