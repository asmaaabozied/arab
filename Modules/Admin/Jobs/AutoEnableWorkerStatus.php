<?php

namespace Modules\Admin\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Worker\Entities\Worker;

class AutoEnableWorkerStatus implements ShouldQueue
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
        $suspendedWorkers = Worker::withoutTrashed()->where('status', 'disable')->get();
        foreach ($suspendedWorkers as $worker) {
            $suspend_time = Carbon::parse($worker->suspend_start_date)->addDays($worker->suspend_days)->format('Y-m-d');
            $now = Carbon::now()->format('Y-m-d');
            if ($now > $suspend_time) {
                /**
                 * The worker has served the specified period of suspension and must reactivate their account
                 */
                $worker->update([
                    'status' => 'enable',
                    'suspend_days' => 0,
                    'suspend_start_date' => null,
                ]);
//                todo Sending an email to the worker informing him of activating his account
            }
        }


//        dd("suspend_start_date: " .$worker->suspend_start_date,"suspend_days: ".$worker->suspend_days,"suspend_time: ".$suspend_time,'now: '.$now);


    }
}
