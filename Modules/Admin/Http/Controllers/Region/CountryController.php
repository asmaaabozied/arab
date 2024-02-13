<?php

namespace Modules\Admin\Http\Controllers\Region;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Admin\Http\Requests\StoreNewCityInCountryRequest;
use Modules\Admin\Http\Requests\StoreNewCountryRequest;
use Modules\Admin\Http\Requests\UpdateCityOfCountryRequest;
use Modules\Admin\Http\Requests\UpdateCountryRequest;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    protected function flag()
    {
        $default_flag = url('assets/img/flag/flag.svg');
        return $default_flag;
    }

    public function index()
    {
        $page_name = "ArabWorkers|Admin - Countries";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Countries";
        $data = Country::withoutTrashed()->withCount(
            [
                'tasks',
                'employers',
                'workers',
                'cities',
            ]
        )->get();
        return view('admin::layouts.region.country.index', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function showCreateCountryFrom()
    {
        $page_name = 'ArabWorkers|Admin - Countries -  Create New Country';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Countries - Create New Country";
        $default_flag = $this->flag();

        return view('admin::layouts.region.country.createNewCountry', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'default_flag',
        ]));
    }

    public function storeNewCountry(StoreNewCountryRequest $request)
    {
        $validated = $request->validated();
        if (isset($validated['flag'])) {
            $flag = $validated['flag'] = $request->file('flag')->store('Countries/flags', 'public');
        } else {
            $flag = null;
        }
        if (isset($validated['is_arabic'])) {
            $is_arabic = "true";
        } else {
            $is_arabic = "false";
        }

        $country = Country::create([
            'flag' => $flag,
            'name' => $validated['country_en_name'],
            'ar_name' => $validated['country_ar_name'],
            'calling_code' => $validated['calling_code'],
            'min_price' => $validated['min_price'],
            'is_arabic' => $is_arabic,
        ]);
        City::create([
            'name' => $validated['capital_en_name'],
            'ar_name' => $validated['capital_ar_name'],
            'country_id' => $country->id,
            'min_city_cost' => $validated['min_price'],
        ]);
        alert()->toast(trans('admin::admin.The country and capital has been created successfully'), 'success');
        return redirect()->route('admin.countries.index');
    }


    public function showEditCountryForm($country)
    {
        $page_name = 'ArabWorkers|Admin - Countries -  Edit Country';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Countries - Edit Country";
        $data = Country::withoutTrashed()->findOrFail($country);
        $default_flag = $this->flag();
//        dd($data);
        return view('admin::layouts.region.country.editCountry', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'default_flag',
            'data',
        ]));
    }


    public function updateCountry(UpdateCountryRequest $request, $id)
    {
        $validated = $request->validated();
        $country = Country::withoutTrashed()->findOrFail($id);
        if (isset($validated['flag'])) {
            $flag = $validated['flag'] = $request->file('flag')->store('Countries/flags', 'public');
            $old_flag = $country->flag;
            File::delete(storage_path('app/public/' . $old_flag));
        } else {
            $flag = $country->flag;
        }
        if (isset($validated['is_arabic'])) {
            $is_arabic = "true";
        } else {
            $is_arabic = "false";
        }
        $country->update([
            'flag' => $flag,
            'name' => $validated['country_en_name'],
            'ar_name' => $validated['country_ar_name'],
            'calling_code' => $validated['calling_code'],
            'is_arabic' => $is_arabic,
        ]);

        alert()->toast(trans('admin::admin.The country has been updated successfully'), 'success');
        return redirect()->route('admin.countries.index');
    }

    public function showCitiesOfCountry($country)
    {
        $page_name = 'ArabWorkers|Admin -Cities of Country';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Cities of Country";
        $country = Country::withoutTrashed()->findOrFail($country);
        $data = City::withoutTrashed()->where([
            ['country_id', $country->id]
        ])->withCount(
            [
                'tasks',
                'employers',
                'workers',
            ]
        )->get();
        return view('admin::layouts.region.country.citiesOfCountry', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'country',
        ]));
    }

    public function editCityOfCountry($city){
        $page_name = 'ArabWorkers|Admin - Update city';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Update City";
        $data = City::withoutTrashed()->with('country')->findOrFail($city);
        return view('admin::layouts.region.country.editCityForm', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));
    }

    public function updateCityOfCountry(UpdateCityOfCountryRequest $request, $city){
        $validated = $request->validated();
        $city = City::withoutTrashed()->findOrFail($city);
        $city->update([
            'name' => $validated['name'],
            'ar_name' => $validated['ar_name'],
            'min_city_cost' => $validated['min_city_cost'],

        ]);

        alert()->toast(trans('admin::admin.The city has been updated successfully'), 'success');
        return redirect()->route('admin.show.cities.of.country',$city->country_id);

    }

    public function showCreateCityInCountryForm($country_id)
    {
        $page_name = 'ArabWorkers|Admin - Create New City';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Create New City";
        $country = Country::withoutTrashed()->findOrFail($country_id);
        return view('admin::layouts.region.country.createNewCityInCountry', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'country',
        ]));
    }

    public function storeNewCityInCountry(StoreNewCityInCountryRequest $request, $country){
        $validated = $request->validated();
        $country = Country::withoutTrashed()->findOrFail($country);
        City::create([
            'name'=>$validated['name'],
            'ar_name'=>$validated['ar_name'],
            'country_id' => $country->id,
            'min_city_cost'=>$validated['min_city_cost'],
        ]);
        alert()->toast(trans('admin::admin.The city has been created successfully'), 'success');
        return redirect()->route('admin.show.cities.of.country',$country->id);
    }


}
