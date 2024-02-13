<?php

namespace Modules\Worker\Http\Controllers\Worker;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Employer\Entities\Employer;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Setting\Entities\Setting;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Worker\Entities\Worker;
use Modules\Worker\Http\Requests\SwitchToEmployerAndTransferWalletBalanceRequest;

class SwitchingAccountController extends Controller
{
    protected function guard()
    {
        return Auth::guard('worker');
    }
    protected function employerGuard()
    {
        return Auth::guard('employer');
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

    public function switchToEmployer(Request $request){
        $currently_worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        $check_is_employer = Employer::withoutTrashed()->where([
            ['email', $currently_worker->email],
        ])->first();
        if ($check_is_employer == null and $currently_worker->google_id == null) {
            $random_employer_number = "E" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
            $employer = Employer::create([
                'employer_number' => $random_employer_number,
                'name' => $currently_worker->name,
                'email' => $currently_worker->email,
                'avatar' => $currently_worker->avatar,
                'country_id' => $currently_worker->country_id,
                'city_id' => $currently_worker->city_id,
                'phone' => $currently_worker->phone,
                'gender' => $currently_worker->gender,
                'address' => $currently_worker->address,
                'zip_code' => $currently_worker->zip_code,
                'password' => $currently_worker->password,
            ]);

            AccountSwitchOperation::create([
                'from' => 'worker',
                'to' => 'employer',
                'employer_id' => $employer->id,
                'worker_id' => $currently_worker->id,
                'isTransferWalletBalance' => 'false',
                'transferred_amount' => 0,
            ]);
            $privilege = Privilege::withoutTrashed()->where([
                ['code', 'HDA'],
                ['for', 'dual'],
            ])->first();
            WorkerPrivilege::create([
                'worker_id' =>  $currently_worker->id,
                'count_of_privileges' => $privilege->privileges,
                'type' => $privilege->type,
                'description' => $privilege->title,
            ]);
            $lang = $this->getCurrentLang();
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $this->employerGuard()->login($employer);
            Session::put('applocale', $lang);
            alert()->success('Success',trans('worker::worker.You have been successfully Account SwitchingToEmployer'));
            return redirect()->route('show.employer.panel');
        }elseif ($check_is_employer == null and $currently_worker->google_id != null){
            $random_employer_number = "E" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
            $employer = Employer::create([
                'employer_number' => $random_employer_number,
                'name' => $currently_worker->name,
                'email' => $currently_worker->email,
                'email_verified_at' => $currently_worker->email_verified_at,
                'avatar' => $currently_worker->avatar,
                'country_id' => $currently_worker->country_id,
                'city_id' => $currently_worker->city_id,
                'phone' => $currently_worker->phone,
                'gender' => $currently_worker->gender,
                'address' => $currently_worker->address,
                'zip_code' => $currently_worker->zip_code,
                'password' => $currently_worker->password,
                'google_id' => $currently_worker->google_id,
            ]);

            AccountSwitchOperation::create([
                'from' => 'worker',
                'to' => 'employer',
                'employer_id' => $employer->id,
                'worker_id' => $currently_worker->id,
                'isTransferWalletBalance' => 'false',
                'transferred_amount' => 0,
            ]);
            $privilege = Privilege::withoutTrashed()->where([
                ['code', 'HDA'],
                ['for', 'dual'],
            ])->first();
            WorkerPrivilege::create([
                'worker_id' =>  $currently_worker->id,
                'count_of_privileges' => $privilege->privileges,
                'type' => $privilege->type,
                'description' => $privilege->title,
            ]);
            $lang = $this->getCurrentLang();
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $this->employerGuard()->login($employer);
            Session::put('applocale', $lang);
            alert()->success('Success',trans('worker::worker.You have been successfully Account SwitchingToEmployer'));
            return redirect()->route('show.employer.panel');
        }
        else {
            AccountSwitchOperation::create([
                'from' => 'worker',
                'to' => 'employer',
                'employer_id' => $check_is_employer->id,
                'worker_id' => $currently_worker->id,
                'isTransferWalletBalance' => 'false',
                'transferred_amount' => 0,
            ]);
            $lang = $this->getCurrentLang();
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $this->employerGuard()->login($check_is_employer);
            Session::put('applocale', $lang);
            alert()->success('Success',trans('worker::worker.You have been successfully Account SwitchingToEmployer'));
            return redirect()->route('show.employer.panel');
        }


    }




    public function history()
    {
        $page_name = "ArabWorkers | Workers - Switching Account History";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Switching Account History";
        $my_worker_account = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        $check_dual_account = Employer::withoutTrashed()->where([
            ['email', $my_worker_account->email],
            ['country_id', $my_worker_account->country_id],
            ['city_id', $my_worker_account->city_id],
            ['phone', $my_worker_account->phone],
        ])->first();
        if (isset($check_dual_account)) {
            $data = AccountSwitchOperation::withoutTrashed()
                ->where([
                    ['worker_id', $my_worker_account->id],
                    ['employer_id', $check_dual_account->id],
                    ['from', 'worker'],
                    ['to', 'employer'],
                ])->orWhere([
                    ['worker_id', $my_worker_account->id],
                    ['employer_id', $check_dual_account->id],
                    ['from', 'employer'],
                    ['to', 'worker'],
                ])->orderByDesc('created_at')->get();
        } else {
            $data = null;
        }

        return view('worker::layouts.switchingAccount.history', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',

        ]));
    }


    public function showSwitchToEmployerAndTransferWalletBalanceForm()
    {
        $page_name = "ArabWorkers | Workers - Switching Account";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Switching Account With Transfer Wallet Balance";
        $my_worker_account = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        $check_dual_account = Employer::withoutTrashed()->where([
            ['email', $my_worker_account->email],
            ['country_id', $my_worker_account->country_id],
            ['city_id', $my_worker_account->city_id],
            ['phone', $my_worker_account->phone],
        ])->first();

        if ($check_dual_account == null) {
            alert()->error('Error',trans('worker::worker.An error has occurred Please check the entered data and try again'));
            return redirect()->route('worker.show.switching.account.history');
        } else {
            /**
             * In this step we are sure that the worker has a dual account and can transfer the money to his employer account
             **/
            $my_employer_account = Employer::withoutTrashed()->findOrFail($check_dual_account->id);
            $my_balance_in_employer_wallet = $my_employer_account->wallet_balance;
            $my_balance_in_worker_wallet = $my_worker_account->wallet_balance;
            $fees_by_transfer_wallet_balance = Setting::select('fees_per_transfer_wallet_balance')->first();

            return view('worker::layouts.switchingAccount.switchAccountWithTransferWalletBalanceForm', compact([
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
                'my_balance_in_employer_wallet',
                'my_balance_in_worker_wallet',
                'fees_by_transfer_wallet_balance',
            ]));
        }

    }

    public function switchToEmployerAndTransferWalletBalance(SwitchToEmployerAndTransferWalletBalanceRequest $request)
    {
        $validated = $request->validated();
        $my_worker_account = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        $check_dual_account = Employer::withoutTrashed()->where([
            ['email', $my_worker_account->email],
            ['country_id', $my_worker_account->country_id],
            ['city_id', $my_worker_account->city_id],
            ['phone', $my_worker_account->phone],
        ])->first();

        if ($check_dual_account == null) {
            alert()->error('Error',trans('worker::worker.An error has occurred Please check the entered data and try again'));
            return redirect()->route('worker.show.switch.account.to.employer.with.transfer.wallet.balance.form');
        } else {
            /**
             * In this step we are sure that the worker has a dual account and can transfer the money to his employer account
             **/
            $my_employer_account = Employer::withoutTrashed()->findOrFail($check_dual_account->id);
            $fees_by_transfer_wallet_balance = Setting::select('fees_per_transfer_wallet_balance')->first();

            $check_if_there_is_balance_in_worker_wallet = $my_worker_account->wallet_balance - $validated['AmountTransferred'];
            if ($check_if_there_is_balance_in_worker_wallet < 0) {
                /**
                 * This means that the wallet does not have enough funds to transfer the required amount
                 **/
                alert()->error('error',trans('worker::worker.the worker wallet account does not have enough funds to transfer the required amount'));
                return redirect()
                    ->route('worker.show.switch.account.to.employer.with.transfer.wallet.balance.form')
                    ->with(['error'=>trans('worker::worker.the worker wallet account does not have enough funds to transfer the required amount')]);
            } else {
                $my_worker_account->update([
                    'wallet_balance' => $my_worker_account->wallet_balance - $validated['AmountTransferred'],

                ]);
                $AmountTransferredAfterFees = $validated['AmountTransferred'] - ($validated['AmountTransferred'] * $fees_by_transfer_wallet_balance->fees_per_transfer_wallet_balance / 100);

                /**
                 * Here, the profits from the transferred amount must be recorded in the profit records of the admins
                 * and must be recorded  the amount withdrawn from the worker and sent to the employer in a record for this process
                 **/
                $my_employer_account->update([
                    'wallet_balance' => $my_employer_account->wallet_balance + $AmountTransferredAfterFees,
                ]);

                AccountSwitchOperation::create([
                    'from' => 'worker',
                    'to' => 'employer',
                    'employer_id' => $my_employer_account->id,
                    'worker_id' => $my_worker_account->id,
                    'isTransferWalletBalance' => 'true',
                    'transferred_amount' => $AmountTransferredAfterFees,
                ]);
                $lang = $this->getCurrentLang();
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $this->employerGuard()->login($my_employer_account);
                Session::put('applocale', $lang);
                alert()->success('Success',trans('worker::worker.You have been successfully Account SwitchingToEmployer And Transferred Balance'));
                return redirect()->route('show.employer.panel');
            }


        }

    }

}
