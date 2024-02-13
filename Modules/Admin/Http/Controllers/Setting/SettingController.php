<?php

namespace Modules\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\UpdateSettingRequest;
use Modules\Setting\Entities\Setting;

class SettingController extends Controller
{
    public function index(){
        $page_name = "ArabWorkers | Admins - Settings";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Settings";
        $data = Setting::first();
//        dd($data);
        return view('admin::layouts.setting.index', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));
    }

    public function updateSettings(UpdateSettingRequest $request){
        $validated = $request->validated();
//        dd($validated);
        $data = Setting::first();
        $data->update([
            'min_withdraw_limit' => $validated['min_withdraw_limit'],
            'fees_per_transfer_wallet_balance' => $validated['fees_per_transfer_wallet_balance'],
            'fees_per_withdraw_wallet_using_paypal' => $validated['fees_per_withdraw_wallet_using_paypal'],
            'fees_per_charge_wallet_using_paypal' => $validated['fees_per_charge_wallet_using_paypal'],
            'days_added_to_task_end_date_when_reject_task_proof' => $validated['days_added_to_task_end_date_when_reject_task_proof'],
            'pin_in_top_task_limit_count' => $validated['pin_in_top_task_limit_count'],
            'exchange_rate_api_key' => $validated['exchange_rate_api_key'],
        ]);
        alert()->toast(trans('admin::admin.The settings has been updated successfully'), 'success');
        return redirect()->route('admin.show.setting.attributes');
    }
}
