<?php

namespace Modules\Google\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Modules\Employer\Entities\Employer;
use Modules\Google\Entities\TempGoogleAccount;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Worker\Entities\Worker;
use function Laravel\Prompts\select;

class GoogleController extends Controller
{
    protected function employerGuard()
    {
        return Auth::guard('employer');
    }

    protected function workerGuard()
    {
        return Auth::guard('worker');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $tempAccount = Socialite::driver('facebook')->stateless()->user();
            $findEmployer = Employer::where([
                ['facbook_id', $tempAccount->id],
                ['deleted_at', null]
            ])->first();

            $findWorker = Worker::where([
                ['facbook_id', $tempAccount->id],
                ['deleted_at', null]
            ])->first();

            if ($findEmployer) {
                $this->employerGuard()->login($findEmployer);
                alert()->success('Success',trans('dashboard::auth.You have successfully signed in with your Facebook account'));
                return redirect()->route('show.employer.panel');
            } elseif ($findWorker) {
                $this->workerGuard()->login($findWorker);
                alert()->success('Success',trans('dashboard::auth.You have successfully signed in with your Facebook account'));
                return redirect()->route('show.worker.panel');
            } else {
                if ($tempAccount->user['email_verified'] == 'true') {
                    $email_verified = Carbon::now();
                } else {
                    $email_verified = null;
                }

                $checkExistRecord = TempGoogleAccount::withoutTrashed()->where('facebook_id', $tempAccount->id)->first();
                if ($checkExistRecord) {
                    $google_id = $checkExistRecord->google_id;
                    $page_name = "ArabWorker | Select Auth Type";
                    return view('dashboard::layouts.auth.selectAuthType', compact([
                        'facebook_id',
                        'page_name'
                    ]));
                } else {
                    $tempGoogleAccount = TempGoogleAccount::create([
                        'name' => $tempAccount->name,
                        'email' => $tempAccount->email,
                        'avatar' => $tempAccount->avatar,
                        'facebook_id' => $tempAccount->id,
                        'email_verified_at' => $email_verified,
                        'password' => Hash::make(Carbon::now()),
                    ]);

                    $google_id = $tempGoogleAccount->facebook_id;
                    $page_name = "ArabWorker | Select Auth Type";
                    return view('dashboard::layouts.auth.selectAuthType', compact([
                        'facebook_id',
                        'page_name'
                    ]));
                }
            }
        } catch (Exception $e) {
            alert()->error('Error',$e->getMessage());
            return redirect()->route('')->with('error', trans('dashboard::auth.An error occurred while trying to create the account using facebook account, please try again'));
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $tempAccount = Socialite::driver('google')->stateless()->user();
            $findEmployer = Employer::where([
                ['google_id', $tempAccount->id],
                ['deleted_at', null]
            ])->first();

            $findWorker = Worker::where([
                ['google_id', $tempAccount->id],
                ['deleted_at', null]
            ])->first();

            if ($findEmployer) {
                $this->employerGuard()->login($findEmployer);
                alert()->success('success',trans('dashboard::auth.You have successfully signed in with your Google account'));
                return redirect()->route('show.employer.panel');
            } elseif ($findWorker) {
                $this->workerGuard()->login($findWorker);
                alert()->success('success',trans('dashboard::auth.You have successfully signed in with your Google account'));
                return redirect()->route('show.worker.panel');
            } else {
                if ($tempAccount->user['email_verified'] == 'true') {
                    $email_verified = Carbon::now();
                } else {
                    $email_verified = null;
                }

                $checkExistRecord = TempGoogleAccount::withoutTrashed()->where('google_id', $tempAccount->id)->first();
                if ($checkExistRecord) {
                    $google_id = $checkExistRecord->google_id;
                    $page_name = "ArabWorker | Select Auth Type";
                    return view('dashboard::layouts.auth.selectAuthType', compact([
                        'google_id',
                        'page_name'
                    ]));
                } else {
                    $tempGoogleAccount = TempGoogleAccount::create([
                        'name' => $tempAccount->name,
                        'email' => $tempAccount->email,
                        'avatar' => $tempAccount->avatar,
                        'google_id' => $tempAccount->id,
                        'email_verified_at' => $email_verified,
                        'password' => Hash::make(Carbon::now()),
                    ]);

                    $google_id = $tempGoogleAccount->google_id;
                    $page_name = "ArabWorker | Select Auth Type";
                    return view('dashboard::layouts.auth.selectAuthType', compact([
                        'google_id',
                        'page_name'
                    ]));
                }
            }
        } catch (Exception $e) {
            alert()->error('Error',$e->getMessage());
            return redirect()->route('')->with('error', trans('dashboard::auth.An error occurred while trying to create the account using google account, please try again'));
        }
    }

    public function setAuthTypes($authType, $tempFacebookAccountID)
    {
        if ($authType == "employer" or $authType == "worker") {

            $findAccount = TempGoogleAccount::withoutTrashed()->where('facebook_id', $tempFacebookAccountID)->firstOrFail();
            if ($authType == "employer") {
                $random_employer_number = "E" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                $employer = Employer::create([
                    'employer_number' => $random_employer_number,
                    'name' => $findAccount->name,
                    'email' => $findAccount->email,
                    'avatar' => $findAccount->avatar,
                    'facebook_id' => $findAccount->facebook_id,
                    'email_verified_at' => $findAccount->email_verified_at,
                    'password' => Hash::make($random_employer_number),
                ]);
                $findAccount->forceDelete();
                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'STA'],
                    ['for', 'dual'],
                ])->first();
                EmployerPrivilege::create([
                    'employer_id' => $employer->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                $this->employerGuard()->login($employer);
                alert()->success('Success',trans('dashboard::auth.You have successfully created an account with your Google account by employer type'));
                return redirect()->route('show.employer.panel');
            } else {
                $random_worker_number = "W" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                $worker = Worker::create([
                    'worker_number' => $random_worker_number,
                    'name' => $findAccount->name,
                    'email' => $findAccount->email,
                    'avatar' => $findAccount->avatar,
                    'facebook_id' => $findAccount->facebook_id,
                    'email_verified_at' => $findAccount->email_verified_at,
                    'password' => Hash::make($random_worker_number),
                ]);
                $findAccount->forceDelete();

                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'STA'],
                    ['for', 'dual'],
                ])->first();
                WorkerPrivilege::create([
                    'worker_id' => $worker->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                $this->workerGuard()->login($worker);
                alert()->success('Success',trans('dashboard::auth.You have successfully created an account with your Facebook account by worker type'));
                return redirect()->route('show.worker.panel');
            }

        } else {
            alert()->error('Error',trans('dashboard::auth.An error has occurred, please check that the data entered is correct and try again'));
            return redirect()->route('show.sign.up.form')->with('error', trans('dashboard::auth.An error occurred while trying to create the account using google account, please try again'));
        }
    }

    public function setAuthType($authType, $tempGoogleAccountID)
    {
        if ($authType == "employer" or $authType == "worker") {

            $findAccount = TempGoogleAccount::withoutTrashed()->where('google_id', $tempGoogleAccountID)->firstOrFail();
            if ($authType == "employer") {
                $random_employer_number = "E" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                $employer = Employer::create([
                    'employer_number' => $random_employer_number,
                    'name' => $findAccount->name,
                    'email' => $findAccount->email,
                    'avatar' => $findAccount->avatar,
                    'google_id' => $findAccount->google_id,
                    'email_verified_at' => $findAccount->email_verified_at,
                    'password' => Hash::make($random_employer_number),
                ]);
                $findAccount->forceDelete();
                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'STA'],
                    ['for', 'dual'],
                ])->first();
                EmployerPrivilege::create([
                    'employer_id' => $employer->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                $this->employerGuard()->login($employer);
                alert()->success('Success',trans('dashboard::auth.You have successfully created an account with your Google account by employer type'));
                return redirect()->route('show.employer.panel');
            } else {
                $random_worker_number = "W" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                $worker = Worker::create([
                    'worker_number' => $random_worker_number,
                    'name' => $findAccount->name,
                    'email' => $findAccount->email,
                    'avatar' => $findAccount->avatar,
                    'google_id' => $findAccount->google_id,
                    'email_verified_at' => $findAccount->email_verified_at,
                    'password' => Hash::make($random_worker_number),
                ]);
                $findAccount->forceDelete();

                $privilege = Privilege::withoutTrashed()->where([
                    ['code', 'STA'],
                    ['for', 'dual'],
                ])->first();
                WorkerPrivilege::create([
                    'worker_id' => $worker->id,
                    'count_of_privileges' => $privilege->privileges,
                    'type' => $privilege->type,
                    'description' => $privilege->title,
                ]);
                $this->workerGuard()->login($worker);
                alert()->success('Success',trans('dashboard::auth.You have successfully created an account with your Google account by worker type'));
                return redirect()->route('show.worker.panel');
            }

        } else {
            alert()->error('Error',trans('dashboard::auth.An error has occurred, please check that the data entered is correct and try again'));
            return redirect()->route('show.sign.up.form')->with('error', trans('dashboard::auth.An error occurred while trying to create the account using google account, please try again'));
        }
    }

    public function login()
    {
        return Socialite::driver("sign-in-with-apple")
            ->scopes(["name", "email"])
            ->redirect();
    }

    public function callback(Request $request)
    {
        // get abstract user object, not persisted
//        $user = Socialite::driver("sign-in-with-apple")
//            ->user();


        $tempAccount = Socialite::driver('sign-in-with-apple')->stateless()->user();
        $findEmployer = Employer::where([
            ['apple_id', $tempAccount->id],
            ['deleted_at', null]
        ])->first();

        $findWorker = Worker::where([
            ['apple_id', $tempAccount->id],
            ['deleted_at', null]
        ])->first();

        if ($findEmployer) {
            $this->employerGuard()->login($findEmployer);
            alert()->success('Success',trans('dashboard::auth.You have successfully signed in with your Facebook account'));
            return redirect()->route('show.employer.panel');
        } elseif ($findWorker) {
            $this->workerGuard()->login($findWorker);
            alert()->success('Success',trans('dashboard::auth.You have successfully signed in with your Facebook account'));
            return redirect()->route('show.worker.panel');
        } else {
            $employer = Employer::create(
                [
                    'name' => $tempAccount['name'],
                    'email' => $tempAccount['email'],
                    'password' => bcrypt('123456789')


                ]
            );
            $this->employerGuard()->login($employer);
            return redirect()->route('show.employer.panel');

        }


//        // or use Socialiter to automatically manage user resolution and persistence
//        $user = Socialiter::driver("sign-in-with-apple")
//            ->login();
    }

}
