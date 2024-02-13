<?php

namespace Modules\Worker\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Modules\Currency\Entities\Currency;
use Modules\Worker\Entities\Worker;

class LangAndCurrencyController extends Controller
{
    public function changeAppLang($lang){
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
            alert()->toast(trans('employer::employer.The location has been successfully changed'), 'success');
            return redirect()->route('show.worker.panel');
        }else{
            alert()->toast(trans('employer::employer.The requested language is not supported'), 'error');
            return redirect()->route('show.worker.panel');
        }
    }

    public function changeCurrentCurrency($currency){
        $checkExistsCurrency = Currency::withoutTrashed()->where([
            ['en_name',$currency]
        ])->select('id','en_name')->first();
        if (isset($checkExistsCurrency) and $checkExistsCurrency!=null){
            $employer = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
            $employer->update([
                'current_currency' => $checkExistsCurrency->en_name,
            ]);
            alert()->toast(trans('employer::employer.The currency has been successfully changed'), 'success');
            return redirect()->back();
        }else{
            alert()->toast(trans('employer::employer.The requested currency is not supported'), 'error');
            return redirect()->back();
        }
    }

}
