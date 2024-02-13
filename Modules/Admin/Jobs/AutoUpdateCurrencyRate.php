<?php

namespace Modules\Admin\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Modules\Currency\Entities\Currency;
use Modules\Setting\Entities\Setting;

class AutoUpdateCurrencyRate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
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
            }
        }
    }
}
