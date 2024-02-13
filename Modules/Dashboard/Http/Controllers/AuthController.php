<?php

namespace Modules\Dashboard\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mews\Captcha\Facades\Captcha;
use Modules\Dashboard\Http\Requests\AuthRequest;
use Modules\Dashboard\Http\Requests\SignUpRequest;
use Modules\Employer\Entities\Employer;
use Modules\Privilege\Entities\EmployerPrivilege;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Worker\Entities\Worker;
use Modules\Worker\Http\Requests\WorkerSignUpRequest;

class AuthController extends Controller
{
    protected function EmployerGuard()
    {
        return Auth::guard('employer');
    }

    protected function WorkerGuard()
    {
        return Auth::guard('worker');
    }

    public function showLoginForm()
    {
        $page_name = 'ArabWorkers | SignIn';
        return view('dashboard::layouts.auth.login', compact('page_name'));
    }


    public function refreshCaptcha(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }

    public function authentication(AuthRequest $request)
    {
        $validated = $request->validated();
        $auth_type = $validated['auth_type'];

        if (auth()->guard($auth_type)->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            alert()->success('success',trans('dashboard::auth.You have been successfully logged in by e-mail'));
            if ($auth_type == "employer") {
                return redirect()->route('show.employer.panel');
            } elseif ($auth_type == "worker") {
                return redirect()->route('show.worker.panel');
            } else {
                return redirect()->back()->with([trans('error') => trans('dashboard::auth.An error has occurred, please check that the data entered is correct and try again')]);
            }
        } elseif (auth()->guard($auth_type)->attempt([$auth_type . '_number' => $validated['email'], 'password' => $validated['password']])) {
            alert()->success('success',trans('dashboard::auth.You have been successfully logged in by account_number'));
            if ($auth_type == "employer") {
                return redirect()->route('show.employer.panel');
            } elseif ($auth_type == "worker") {
                return redirect()->route('show.worker.panel');
            } else {
                return redirect()->back()->with([trans('error') => trans('dashboard::auth.An error has occurred, please check that the data entered is correct and try again')]);
            }
        } else {
            return redirect()->back()->with([trans('error') => trans('dashboard::auth.The email or account number or password is incorrect')]);
        }
    }


    public function fetchCity(Request $request)
    {
        $lang = app()->getLocale();
        if ($lang == "ar") {
            $data['cities'] = City::withoutTrashed()->where("country_id", $request->country_id)->get(["id", "ar_name"]);
            $data['phone'] = Country::select('calling_code')->find($request->country_id);
        } else {
            $data['cities'] = City::withoutTrashed()->where("country_id", $request->country_id)->get(["id", "name"]);
            $data['phone'] = Country::select('calling_code')->find($request->country_id);

        }
        return response()->json($data);
    }


    public function showSignUpForm()
    {
        $page_name = 'ArabWorkers | SignUp';
        $countries = Country::withoutTrashed()->get();
        return view('dashboard::layouts.auth.signup', compact('page_name', 'countries'));
    }

    public function newPasswords(){



    }


    public function signingUp(SignUpRequest $request)
    {
        $validated = $request->validated();
//        dd($validated, 'this is validated');
        $country = Country::withoutTrashed()->with('cities')->findOrFail($validated['country']);
        for ($i = 0; $i < $country->cities()->count(); $i++) {
            $array_of_cities_id [] = $country->cities[$i]->id;
        }
        /**        check if is the selected city actually located in the selected country */
        if (in_array($validated['city'], $array_of_cities_id) == "true") {
            /**          check if the selected phone number contain the international calling code for the selected country? */
            if (Str::contains($validated['phone'], $country->calling_code) and Str::length($validated['phone']) > Str::length($country->calling_code)) {
                if ($validated['registration_type'] == "worker") {
                    $random_worker_number = "W" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                    $worker = Worker::create([
                        'worker_number' => $random_worker_number,
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'country_id' => $validated['country'],
                        'city_id' => $validated['city'],
                        'phone' => $validated['phone'],
                        'password' => Hash::make($validated['password']),
                    ]);
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
                    auth()->guard('worker')->login($worker);
                    alert()->success('success',trans('worker::signIn.You have been successfully signing up'));
                    return redirect()->route('show.worker.panel');
                } elseif ($validated['registration_type'] == "employer") {
                    $random_employer_number = "E" . Carbon::now()->format('ym') . Str::random(1) . Carbon::now()->format('s') . Str::random(2) . random_int(10, 99);
                    $employer = Employer::create([
                        'employer_number' => $random_employer_number,
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'country_id' => $validated['country'],
                        'city_id' => $validated['city'],
                        'phone' => $validated['phone'],
                        'password' => Hash::make($validated['password']),
                    ]);
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


                    auth()->guard('employer')->login($employer);
                    alert()->success('Success',trans('employer::signIn.You have been successfully signing up'));
                    return redirect()->route('show.employer.panel');
                } else {
                    return redirect()->back()->with([trans('error') => trans('dashboard::auth.An error has occurred, please check that the data entered is correct and try again')]);
                }

            } else {
                return redirect()->back()->with(['error' => trans('worker::signIn.The phone number entered is incorrect')]);
            }
        } else {
            return redirect()->back()->with(['error' => trans('worker::signIn.The selected city is not located in the selected country')]);

        }
    }


    public function showMailForgetForm(){
        $page_name = 'ArabWorkers | Reset Password';
        return view('dashboard::layouts.auth.emailResetPass', compact('page_name'));
    }

    public function sendMailForgetForm()
    {
        dd(1);
    }
    public function showForgetForm()
    {
        $page_name = 'ArabWorkers | Reset Password';
        return view('dashboard::layouts.auth.resetPassword', compact('page_name'));
    }
}
