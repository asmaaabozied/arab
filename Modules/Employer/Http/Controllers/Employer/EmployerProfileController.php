<?php

namespace Modules\Employer\Http\Controllers\Employer;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Employer\Entities\Employer;
use Modules\Employer\Http\Requests\UpdateMyProfileRequest;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;

class EmployerProfileController extends Controller
{
    public function avatar()
    {
        $default_avatar = url('assets/img/default/default-avatar.svg');
        return $default_avatar;
    }

    public function showMyProfile()
    {
        $page_name = "ArabWorkers | Employers - profile";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "MyProfile";

        $employer = Employer::with(['country', 'city', 'level'])->findOrFail(auth()->user()->id);

        $tasks = $employer->tasks()->with(['category', 'TaskStatuses.status'])->get();

        if ($employer->privileges()->exists() == true) {
            for ($i = 0; $i < $employer->privileges()->count(); $i++) {
                if ($employer->privileges[$i]->type == "plus") {
                    $total[] = "+" . $employer->privileges[$i]->count_of_privileges;
                } else {
                    $total[] = "-" . $employer->privileges[$i]->count_of_privileges;
                }
            }
        } else {
            $total [] = 0;
        }
//        dd($tasks, $employer);
        return view('employer::layouts.employer.profile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'employer',
            'tasks',
            'total',
        ]));

    }


    public function showUpdateMyProfileForm()
    {
        $page_name = "ArabWorkers | Employers - edit profile";
        $main_breadcrumb = "Employer Panel";
        $sub_breadcrumb = "Edit My Profile";
        $employer = Employer::withoutTrashed()->with('level')->findOrFail(auth()->user()->id);
        $default_avatar = $this->avatar();
        $countries = Country::withoutTrashed()->get();
        if ($employer->privileges()->exists() == true) {
            for ($i = 0; $i < $employer->privileges()->count(); $i++) {
                if ($employer->privileges[$i]->type == "plus") {
                    $total[] = "+" . $employer->privileges[$i]->count_of_privileges;
                } else {
                    $total[] = "-" . $employer->privileges[$i]->count_of_privileges;
                }
            }
        } else {
            $total [] = 0;
        }
        return view('employer::layouts.employer.editProfile', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'employer',
            'default_avatar',
            'countries',
            'total',
        ]));
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

    public function updateMyProfile(UpdateMyProfileRequest $request)
    {


        $validated = $request->validated();
        $employer = Employer::withoutTrashed()->findOrFail(auth()->user()->id);
//        if ($employer->google_id == null) {
//            if (isset($validated['avatar'])) {
//                $avatar = $validated['avatar'] = $request->file('avatar')->store('Employers/avatars', 'public');
//                File::delete(storage_path('app/public/' . $employer->avatar));
//            } else {
//                $avatar = $employer->avatar;
//            }
//        } else {
//            $avatar = $employer->avatar;
//        }
        if (isset($validated['password'])) {
            $employer->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }


        if ($employer->google_id == null) {
            $employer->update([
//                'avatar' => $avatar,
                'name' => $validated['name'],
                'address' => $validated['address'],
                'zip_code' => $validated['zip_code'],
                'description' => $validated['description'],
                'gender' => $validated['gender'],
            ]);
        } elseif (
            $employer->google_id != null
            and array_key_exists('country', $validated)
            and array_key_exists('city', $validated)
            and array_key_exists('phone', $validated)

        ) {
            $country = Country::withoutTrashed()->findOrFail($validated['country']);

            if (Str::contains($validated['phone'], $country->calling_code) and Str::length($validated['phone']) > Str::length($country->calling_code)) {
                $employer->update([
//                    'avatar' => $avatar,
                    'name' => $validated['name'],
                    'address' => $validated['address'],
                    'zip_code' => $validated['zip_code'],
                    'description' => $validated['description'],
                    'gender' => $validated['gender'],
                    'country_id' => $validated['country'],
                    'city_id' => $validated['city'],
                    'phone' => $validated['phone'],
                ]);
            } else {
//                alert()->toast(trans('employer::employer.The phone number entered is incorrect'), 'error');


                alert()->error('Error',trans('employer::employer.The phone number entered is incorrect'));

                return redirect()->back();
            }

        } else {
            $employer->update([
//                'avatar' => $avatar,
                'name' => $validated['name'],
                'address' => $validated['address'],
                'zip_code' => $validated['zip_code'],
                'description' => $validated['description'],
                'gender' => $validated['gender'],
            ]);
//            alert()->toast(trans('employer::employer.You are update your information successfully'), 'success');

            alert()->success('Success',trans('employer::employer.You are update your information successfully'));


            return redirect()->route('employer.show.my.profile');
        }

        alert()->success('Success',trans('employer::employer.You are update your information successfully'));
        return redirect()->route('employer.show.my.profile');

//        return back();

    }

}
