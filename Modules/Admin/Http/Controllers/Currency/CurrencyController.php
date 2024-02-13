<?php

namespace Modules\Admin\Http\Controllers\Currency;

use GuzzleHttp\Client;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Http\Requests\CreateNewCurrencyRequest;
use Modules\Admin\Http\Requests\UpdateCurrencyRequest;
use Modules\Admin\Jobs\AutoUpdateCurrencyRate;
use Modules\Currency\Entities\Currency;
use Modules\Currency\Entities\SupportedCurrencyCode;
use Modules\Setting\Entities\Setting;

class CurrencyController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers|Admin - Currencies";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Currencies";
        $data = Currency::withoutTrashed()->get();
        return view('admin::layouts.currency.index', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function showSupportedCurrencyCodes()
    {
        $page_name = "ArabWorkers|Admin - Currencies";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "SupportedCurrencyCodes";
        $data = SupportedCurrencyCode::withoutTrashed()->get();
        return view('admin::layouts.currency.supportedCurrencyCodes', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function updateSupportedCurrencyCodes()
    {
        $apiKey = Setting::select('exchange_rate_api_key')->first();
        $url = 'https://v6.exchangerate-api.com/v6/' . $apiKey->exchange_rate_api_key . '/codes';
        $response = Http::get($url);
        $status = $response->getStatusCode();
        $jsonData = $response->json();
        if ($jsonData['result'] == 'success' and $status == 200 and count($jsonData['supported_codes']) > 1) {
            SupportedCurrencyCode::truncate();
            $supportedCurrencyCodeTable = new SupportedCurrencyCode();
            for ($i = 0; $i < count($jsonData['supported_codes']); $i++) {
                $supportedCurrencyCodeTable::create([
                    'currency_code' => $jsonData['supported_codes'][$i][0],
                    'currency_name' => $jsonData['supported_codes'][$i][1],
                ]);
            }
            alert()->toast(trans('admin::admin.All currencies and their international codes have been updated'), 'success');
            return redirect()->route('admin.supported.currency.codes.index');
        } else {
            alert()->toast(trans('admin::admin.An error has occurred while updating the currency symbols and names, please check the validity of the subscription or check the symbols and names manually'), 'error');
            return redirect()->route('admin.supported.currency.codes.index');
        }


    }

    public function showCreateNewCurrencyForm()
    {
        $page_name = "ArabWorkers|Admin - Currencies";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Create Currency";
        return view('admin::layouts.currency.createCurrency', compact(
            [
                'page_name',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function CreateNewCurrency(CreateNewCurrencyRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['icon'])) {
            $icon = $validated['icon'] = $request->file('icon')->store('Currencies', 'public');
        } else {
            $icon = null;
        }
        Currency::create([
            'en_name' => $validated['en_name'],
            'ar_name' => $validated['ar_name'],
            'rate' => $validated['rate'],
            'icon' => $icon,
            'is_default' => 'false',
        ]);

        alert()->toast(trans('admin::admin.The currency rate has been created successfully'), 'success');
        return redirect()->route('admin.currency.index');
    }

    public function showUpdateCurrencyForm($currency)
    {
        $page_name = "ArabWorkers|Admin - Currencies";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Update Currencies";
        $data = Currency::withoutTrashed()->findOrFail($currency);
        if ($data->en_name == "USD" and $data->rate == 1) {
            alert()->toast(trans('admin::admin.The original currency cannot be modified'), 'info');
            return redirect()->route('admin.currency.index');
        } else {
            return view('admin::layouts.currency.editCurrency', compact(
                [
                    'page_name',
                    'data',
                    'main_breadcrumb',
                    'sub_breadcrumb',
                ]
            ));
        }
    }

    public function updateCurrency(UpdateCurrencyRequest $request, $currency)
    {
        $validated = $request->validated();
        $currency = Currency::withoutTrashed()->findOrFail($currency);
        if ($currency->en_name == "USD" and $currency->rate == 1) {
            alert()->toast(trans('admin::admin.The original currency cannot be modified'), 'info');
            return redirect()->route('admin.currency.index');
        } else {

            if (isset($validated['icon'])) {
                $icon = $validated['icon'] = $request->file('icon')->store('Currencies', 'public');
                $old_icon = $currency->icon;
                File::delete(storage_path('app/public/' . $old_icon));
            } else {
                $icon = $currency->icon;
            }

            $currency->update([
                'rate' => $validated['rate'],
                'icon' => $icon,
            ]);
        }

        alert()->toast(trans('admin::admin.The currency rate has been updated successfully'), 'success');
        return redirect()->route('admin.currency.index');
    }


    public function updateAllCurrencyRate()
    {
        $apiKey = Setting::select('exchange_rate_api_key')->first();
        $url = 'https://v6.exchangerate-api.com/v6/' . $apiKey->exchange_rate_api_key . '/latest/USD';
        $myCurrencies = Currency::withoutTrashed()->get();
        if (count($myCurrencies) > 1) {
            $response = Http::get($url);
            $status = $response->getStatusCode();
            $jsonData = $response->json();
            if ($status == "200") {
                for ($i = 0; $i < count($myCurrencies); $i++) {
                    if (isset($jsonData['conversion_rates'][$myCurrencies[$i]->en_name])) {
                        $conversionRates[$myCurrencies[$i]->en_name] = $jsonData['conversion_rates'][$myCurrencies[$i]->en_name];
                        $myCurrencies[$i]->update([
                            'rate' => $jsonData['conversion_rates'][$myCurrencies[$i]->en_name],
                        ]);
                    }


                }
                alert()->toast(trans('admin::admin.The currency rate has been auto updated successfully'), 'success');
                return redirect()->route('admin.currency.index');
            } else {
                /**
                 * In this case, the request is rejected for several reasons,
                 * including the expiration of the subscription to the customer service provider,
                 * or apiKey has expired
                 * or perhaps there was a problem with the Internet
                 **/
                alert()->toast(trans('admin::admin.An error has occurred while trying to update the currency value. Please make sure that the subscription is valid, or update the rates manually'), 'error');
                return redirect()->route('admin.currency.index');
            }


        } else {
            alert()->toast(trans('admin::admin.First, add a sub-currency'), 'error');
            return redirect()->route('admin.currency.index');
        }


    }
}
