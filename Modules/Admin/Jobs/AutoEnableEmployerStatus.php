<?php

namespace Modules\Admin\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Employer\Entities\Employer;

class AutoEnableEmployerStatus implements ShouldQueue
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
        $suspendedEmployers = Employer::withoutTrashed()->where('status', 'disable')->get();
        foreach ($suspendedEmployers as $employer) {
            $suspend_time = Carbon::parse($employer->suspend_start_date)->addDays($employer->suspend_days)->format('Y-m-d');
            $now = Carbon::now()->format('Y-m-d');
            if ($now > $suspend_time) {
                /**
                 * The employer has served the specified period of suspension and must reactivate their account
                 */
                $employer->update([
                    'status' => 'enable',
                    'suspend_days' => 0,
                    'suspend_start_date' => null,
                ]);
//                todo Sending an email to the employer informing him of activating his account
            }
        }


//        dd("suspend_start_date: " .$employer->suspend_start_date,"suspend_days: ".$employer->suspend_days,"suspend_time: ".$suspend_time,'now: '.$now);


    }
}
