<?php

namespace Modules\Admin\Http\Controllers\Region;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreNewCityRequest;
use Modules\Admin\Http\Requests\UpdateCityRequest;
use Modules\Region\Entities\City;
use Modules\Region\Entities\Country;

class CityController extends Controller
{

    public function index()
    {
        $page_name = "ArabWorkers|Admin - Cities";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Cities";
        $data = City::withoutTrashed()->withCount(
            [
                'tasks',
                'employers',
                'workers',
            ]
        )->get();
        return view('admin::layouts.region.city.index', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function showCreateCityForm(){
        $page_name = 'ArabWorkers|Admin - Create New City';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Create New City";
        $countries = Country::withoutTrashed()->get();
        return view('admin::layouts.region.city.createNewCity', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'countries',

        ]));
    }
    public function storeNewCity(StoreNewCityRequest $request){
        $validated = $request->validated();
        City::create([
            'name'=>$validated['name'],
            'ar_name'=>$validated['ar_name'],
            'country_id' => $validated['country_id'],
            'min_city_cost'=>$validated['min_city_cost'],
        ]);
        alert()->toast(trans('admin::admin.The city has been created successfully'), 'success');
        return redirect()->route('admin.cities.index');
    }
    public function showEditCityForm($city){
        $data = City::withoutTrashed()->with('country')->findOrFail($city);
        $page_name = 'ArabWorkers|Admin - Edit City';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Edit City";
        $countries = Country::withoutTrashed()->where('id','!=',$data->country_id)->get();
        return view('admin::layouts.region.city.editCityForm', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'countries',
            'data',

        ]));
    }
    public function updateCity(UpdateCityRequest $request ,$city){
        $validated = $request->validated();
        $city = City::withoutTrashed()->findOrFail($city);
        $city->update([
            'name'=>$validated['name'],
            'ar_name'=>$validated['ar_name'],
            'country_id' => $validated['country_id'],
            'min_city_cost'=>$validated['min_city_cost'],
        ]);
        alert()->toast(trans('admin::admin.The city has been updated successfully'), 'success');
        return redirect()->route('admin.cities.index');

    }
}
