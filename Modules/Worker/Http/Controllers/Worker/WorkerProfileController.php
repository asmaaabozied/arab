<?php

namespace Modules\Worker\Http\Controllers\Worker;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Employer\Entities\Employer;
use Modules\Privilege\Entities\Privilege;
use Modules\Privilege\Entities\WorkerPrivilege;
use Modules\SwitchAccount\Entities\AccountSwitchOperation;
use Modules\Worker\Entities\Worker;

use Modules\Currency\Entities\Currency;
use Modules\Setting\Entities\Status;
use Modules\Task\Entities\TaskWorker;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use Modules\Worker\Http\Requests\UpdateMyProfileRequest;

class WorkerProfileController extends Controller
{
    public function getCurrentLang()
    {
        $current_lange = app()->getLocale();
        if ($current_lange != null) {
            $lang = $current_lange;
        } else {
            $lang = "ar";
        }

        return $lang;
    }

    public function showMyProfile()
    {
        $page_name = "ArabWorkers | Workers - profile";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "MyProfile";

        $worker = Worker::with(['country', 'city', 'level', 'proofs'])->findOrFail(auth()->user()->id);
        $tasks = $worker->tasks()->with(['task.category'])->get();

        if ($worker->privileges()->exists() == true){
            for($i=0;$i<$worker->privileges()->count();$i++){
                if ($worker->privileges[$i]->type == "plus") {
                    $total[] = "+" . $worker->privileges[$i]->count_of_privileges;
                }
                else{
                    $total[] = "-" . $worker->privileges[$i]->count_of_privileges;
                }
            }
        }else{
            $total [] = 0;
        }
        return view('worker::layouts.worker.profile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'worker',
            'tasks',
            'total',
        ]));

    }
    public function showUpdateMyProfileForm()
    {
        $page_name = "ArabWorkers | Workers - profile";
        $main_breadcrumb = "Worker Panel";
        $sub_breadcrumb = "Edit My Profile";
        $worker = Worker::withoutTrashed()->with('level')->findOrFail(auth()->user()->id);
//        dd($worker);
        $default_avatar = $this->avatar();
        $countries = Country::withoutTrashed()->get();
        if ($worker->privileges()->exists() == true){
            for($i=0;$i<$worker->privileges()->count();$i++){
                if ($worker->privileges[$i]->type == "plus") {
                    $total[] = "+" . $worker->privileges[$i]->count_of_privileges;
                }
                else{
                    $total[] = "-" . $worker->privileges[$i]->count_of_privileges;
                }
            }
        }else{
            $total [] = 0;
        }
        return view('worker::layouts.worker.editProfile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'worker',
            'default_avatar',
            'countries',
            'total',
        ]));
    }

    public function fetchCit(Request $request)
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
    public function avatar()
    {
        $default_avatar = url('assets/img/default/default-avatar.svg');
        return $default_avatar;
    }
    public function updateMyProfile(UpdateMyProfileRequest $request)
    {
        $validated = $request->validated();
        $worker = Worker::withoutTrashed()->findOrFail(auth()->user()->id);
//        if ($worker->google_id == null) {
//            if (isset($validated['avatar'])) {
//                $avatar = $validated['avatar'] = $request->file('avatar')->store('Workers/avatars', 'public');
//                File::delete(storage_path('app/public/' . $worker->avatar));
//            } else {
//                $avatar = $worker->avatar;
//            }
//        } else {
//            $avatar = $worker->avatar;
//        }
        if (isset($validated['password'])) {
            $worker->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }


        if ($worker->google_id == null) {
            $worker->update([
//                'avatar' => $avatar,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'zip_code' => $validated['zip_code'],
                'description' => $validated['description'],
                'gender' => $validated['gender'],
            ]);
            alert()->success('Success',trans('worker::worker.You are update your information successfully'));
            return redirect()->route('worker.show.my.profile');
        } elseif (
            $worker->google_id != null
            and array_key_exists('country', $validated)
            and array_key_exists('city', $validated)
            and array_key_exists('phone', $validated)

        ) {
            $country = Country::withoutTrashed()->findOrFail($validated['country']);
            if (Str::contains($validated['phone'], $country->calling_code) and Str::length($validated['phone']) > Str::length($country->calling_code)) {
                $worker->update([
//                    'avatar' => $avatar,
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'zip_code' => $validated['zip_code'],
                    'description' => $validated['description'],
                    'gender' => $validated['gender'],
                    'country_id' => $validated['country'],
                    'city_id' => $validated['city'],
                    'phone' => $validated['phone'],
                ]);
                alert()->success('success',trans('worker::worker.You are update your information successfully'));
                return redirect()->route('worker.show.my.profile');
            }else{
                alert()->error('Error',trans('employer::employer.The phone number entered is incorrect'));
                return redirect()->back();
            }

        } else {
            $worker->update([
//                'avatar' => $avatar,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'zip_code' => $validated['zip_code'],
                'description' => $validated['description'],
                'gender' => $validated['gender'],
            ]);
            alert()->success('Success',trans('worker::worker.You are update your information successfully'));
            return redirect()->route('worker.show.my.profile');
        }


    }



}
