<?php

namespace Modules\Employer\Http\Controllers\Employer;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Employer\Entities\Employer;
use Modules\Mail\Entities\TemporaryEmployerToken;

class VerifyAccountController extends Controller
{
    public function employer()
    {
        $employer = Employer::withoutTrashed()->findOrFail(auth()->user()->id);
        return $employer;
    }


    public function SendEmailVerification()
    {
        $employer = $this->employer();
        $token = Str::random(64);
        $checkLimitToken = TemporaryEmployerToken::withoutTrashed()->where('employer_id', $employer->id)->get();
        if (count($checkLimitToken) <= 4) {
            $savedToken = TemporaryEmployerToken::create([
                'employer_id' => $employer->id,
                'token' => $token,
            ]);
            Mail::send('mail::includes.employer.verification_email', [
                'token' => $savedToken->token,
                'employer_number' => $employer->employer_number
            ], function ($message) use ($employer) {
                $message->to($employer->email);
                $message->subject(trans('employer::employer.Employer Verification Mail'));
            });
//            alert()->toast(trans('employer::employer.The confirmation email has been sent, check your inbox or spam and click on the confirmation email option'), 'success');
            alert()->success('Success',trans('employer::employer.The confirmation email has been sent, check your inbox or spam and click on the confirmation email option'));


            return redirect()->route('employer.show.my.profile');
        } else {
//            alert()->toast(trans('employer::employer.You have exceeded the account activation limit of times, and therefore your account has been suspended Contact our support team or create a new account'), 'error');

            alert()->error('Error',trans('employer::employer.You have exceeded the account activation limit of times, and therefore your account has been suspended Contact our support team or create a new account'));


            return redirect()->route('employer.show.my.profile');
        }
    }


    public function verifyAccount($token, $employer_number)
    {
        $employer = Employer::withoutTrashed()->where('employer_number', $employer_number)->first();
        if ($employer == null){
            alert()->toast(trans('employer::employer.An error occurred while confirming the email, please try again later'), 'error');
            return redirect()->route('employer.show.my.profile');
        }
        if ($employer->email_verified_at != null){
            alert()->toast(trans('employer::employer.You have already confirmed your email and you do not need to do this procedure again'), 'info');
            return redirect()->route('employer.show.my.profile');
        }
        if ($employer->temporaryToken->last()->token == $token) {

            $employer->temporaryToken()->forceDelete();
            $employer->update([
                'email_verified_at' => Carbon::now(),
            ]);
            alert()->success('Success',trans('employer::employer.Email has been confirmed successfully'));
            return redirect()->route('employer.show.my.profile');
        } else {
            $employer->temporaryToken()->forceDelete();
            alert()->error('Error',trans('employer::employer.An error occurred while confirming the email, please try again later'));
            return redirect()->route('employer.show.my.profile');
        }
    }
    public function SendSMSVerification(){

//        Smsmisr::send("hello world", "00201555141282");
//        alert()->toast(trans('worker::worker.A text message has been sent to the phone number registered with us. Check the message and enter the code sent into the required box.'), 'success');
//        alert()->toast(trans('employer::employer.This service is not currently active'), 'info');
        alert()->info('Info',trans(trans('employer::employer.This service is not currently active')));


        return redirect()->route('employer.show.my.profile');
    }
}
