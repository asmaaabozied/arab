<?php

namespace Modules\Worker\Http\Controllers\Worker;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Mail\Entities\TemporaryWorkerToken;
use Modules\Worker\Entities\Worker;

class VerifyAccountController extends Controller
{
    public function worker()
    {
        $worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
        return $worker;
    }

    public function SendEmailVerification()
    {
        $worker = $this->worker();
        $token = Str::random(64);
        $checkLimitToken = TemporaryWorkerToken::withoutTrashed()->where('worker_id', $worker->id)->get();
        if (count($checkLimitToken) <= 4) {
            $savedToken = TemporaryWorkerToken::create([
                'worker_id' => $worker->id,
                'token' => $token,
            ]);
            Mail::send('mail::includes.worker.verification_email', [
                'token' => $savedToken->token,
                'worker_number' => $worker->worker_number
            ], function ($message) use ($worker) {
                $message->to($worker->email);
                $message->subject(trans('worker::worker.Worker Verification Mail'));
            });
            alert()->success('success',trans('worker::worker.The confirmation email has been sent, check your inbox or spam and click on the confirmation email option'));
            return redirect()->route('worker.show.my.profile');
        } else {
            alert()->toast('error',trans('worker::worker.You have exceeded the account activation limit of times, and therefore your account has been suspended Contact our support team or create a new account'));
            return redirect()->route('worker.show.my.profile');
        }
    }

    public function verifyAccount($token, $worker_number)
    {
        $worker = Worker::withoutTrashed()->where('worker_number', $worker_number)->first();
        if ($worker == null){
            alert()->error('error',trans('worker::worker.An error occurred while confirming the email, please try again later'));
            return redirect()->route('worker.show.my.profile');
        }
        if ($worker->email_verified_at != null){
            alert()->info('Info',trans('worker::worker.You have already confirmed your email and you do not need to do this procedure again'));
            return redirect()->route('worker.show.my.profile');
        }
        if ($worker->temporaryToken->last()->token == $token) {
            $worker->temporaryToken()->forceDelete();
            $worker->update([
                'email_verified_at' => Carbon::now(),
            ]);
            alert()->success('success',trans('worker::worker.Email has been confirmed successfully'));
            return redirect()->route('worker.show.my.profile');
        } else {
            $worker->temporaryToken()->forceDelete();
            alert()->error('Error',trans('worker::worker.An error occurred while confirming the email, please try again later'));
            return redirect()->route('worker.show.my.profile');
        }
    }


    public function SendSMSVerification(){

//        Smsmisr::send("hello world", "00201555141282");
//        alert()->toast(trans('worker::worker.A text message has been sent to the phone number registered with us. Check the message and enter the code sent into the required box.'), 'success');
        alert()->info('info',trans('worker::worker.This service is not currently active'));
        return redirect()->route('worker.show.my.profile');
    }
}
