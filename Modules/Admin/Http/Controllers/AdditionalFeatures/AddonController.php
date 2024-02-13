<?php

namespace Modules\Admin\Http\Controllers\AdditionalFeatures;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\UpdateAddoneRequest;
use Modules\Setting\Entities\Addon;
use Modules\Task\Entities\Task;

class AddonController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers | Admins - AdditionalFeatures";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "AdditionalFeatures";
        $data = Addon::withoutTrashed()->get();
        $tasks = Task::withoutTrashed()->where([
            ['publish_status', 'Published'],
        ])->get();
        if (isset($tasks) and count($tasks)>0){
            for ($i=0;$i<count($tasks);$i++){
                if ($tasks[$i]->only_professional == "true"){
                    $uses_of_only_professional[] = $tasks[$i];
                }
                if ($tasks[$i]->daily_limit != null){
                    $uses_of_daily_limit[] = $tasks[$i];
                }
                if ($tasks[$i]->special_access == "true"){
                    $uses_of_special_access[] = $tasks[$i];
                }
            }
            $count_of_use_only_professional = count($uses_of_only_professional);
            $count_of_use_daily_limit = count($uses_of_daily_limit);
            $count_of_special_access = count($uses_of_special_access);
        }else{
            $count_of_use_only_professional = 0;
            $count_of_use_daily_limit = 0;
            $count_of_special_access = 0;
        }


        return view('admin::layouts.addons.index', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'count_of_use_only_professional',
            'count_of_use_daily_limit',
            'count_of_special_access',
        ]));
    }

    public function showEditAddonForm($addon){
        $page_name = "ArabWorkers | Admins - AdditionalFeatures";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Edit Additional Feature";
        $data = Addon::withoutTrashed()->findOrFail($addon);
        $default_icon = url('assets/img/default/action.png');
        return view('admin::layouts.addons.editAddon', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'default_icon',
        ]));
    }

    public function updateAddon(UpdateAddoneRequest $request, $addon){
        $page_name = "ArabWorkers | Admins - AdditionalFeatures";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Edit Additional Feature";
        $data = Addon::withoutTrashed()->findOrFail($addon);
        $validated = $request->validated();
        if (isset($validated['icon'])) {
            $icon = $validated['icon'] = $request->file('icon')->store('Addons/Icons', 'public');
        } else {
            $icon = null;
        }

        $data->update([
            'icon'=>$icon,
            'fees'=>$validated['fees'],
        ]);
        alert()->toast(trans('admin::admin.The addon has been updated successfully'), 'success');
        return redirect()->route('admin.addons.index');

    }


}
