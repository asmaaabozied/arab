<?php

namespace Modules\Admin\Http\Controllers\Privilege;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\UpdatePrivilegeRequest;
use Modules\Privilege\Entities\Privilege;

class PrivilegeController extends Controller
{

    public function index()
    {
        $page_name = "ArabWorkers|Admin - Privileges";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Privileges";
        $data = Privilege::withoutTrashed()->get();
        return view('admin::layouts.privilege.index', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function showEditPrivilegeForm($privilege)
    {
        $page_name = "ArabWorkers|Admin - EditPrivileges";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "EditPrivileges";
        $data = Privilege::withoutTrashed()->findOrFail($privilege);

        return view('admin::layouts.privilege.editPrivilege', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function updatePrivilege(UpdatePrivilegeRequest $request,$privilege ){
        $validated = $request->validated();
        $data = Privilege::withoutTrashed()->findOrFail($privilege);
        $data->update([
            'privileges' => $validated['countOfPrivileges'],
        ]);

        alert()->toast(trans('admin::admin.The privilege has been updated successfully'), 'success');
        return redirect()->route('admin.privileges.index');

    }


}
