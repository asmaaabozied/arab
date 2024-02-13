<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\StoreNewAdminRequest;
use Modules\Admin\Http\Requests\UpdateAdminRequest;
use Modules\Role\Entities\Role;

class AdminController extends Controller
{
    public function index()
    {
        $page_name = "ArabWorkers | Admins";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Admins";
        $data = Admin::with('role')->whereNull('deleted_at')->get();
        return view('admin::layouts.admin.admins', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));
    }

    public function showCreateFrom()
    {

        $page_name = "ArabWorkers | Admins - Create New Admin";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Admins - Create New Admin";
        $default_avatar = url('assets/img/default/default-avatar.svg');
        $roles = Role::withoutTrashed()->get();
        return view('admin::layouts.admin.createNewAdmin', compact([
            'page_name',
            'default_avatar',
            'main_breadcrumb',
            'sub_breadcrumb',
            'roles',

        ]));
    }

    public function store(StoreNewAdminRequest $request)
    {
        $validated = $request->validated();
//        dd($validated);
        if (isset($validated['avatar'])) {
            $avatar = $validated['avatar'] = $request->file('avatar')->store('Admins/avatars', 'public');
        } else {
            $avatar = null;
        }
        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'avatar' => $avatar,
            'role_id' => $validated['role_id'],
            'status' => $validated['status'],
            'administrative_number' => 'AD' . rand(0, 9999999),
            'password' => Hash::make($validated['password']),
        ]);
        alert()->toast(trans('admin::admin.The admin has been created successfully'), 'success');
        return redirect()->route('show.admins.index');
    }

    public function showEditForm($id)
    {
        if ($id == 1 | $id == 2) {
            alert()->toast(trans('admin::admin.You do not have permission to edit this admin'), 'error');
            return redirect()->route('show.admins.index');
        }
        if ($id == auth()->id()) {
            alert()->toast(trans('admin::admin.You do not have permission to edit your account ask the main admin to edit your account'), 'error');

            return redirect()->route('show.admins.index');
        }
        $page_name = "ArabWorkers | Admins - Edit Admin";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = " Admins - Edit Admin";
        $data = Admin::with('role')->findOrFail($id);
        $roles = Role::withoutTrashed()->where('id', '!=', $data->role_id)->get();
        $default_avatar = url('assets/img/default/default-avatar.svg');
        return view('admin::layouts.admin.editAdmin', compact([
            'data',
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'default_avatar',
            'roles',

        ]));
    }

    public function updateEditedAdmin(UpdateAdminRequest $request, $id)
    {
        if ($id == 1 | $id == 2) {
            alert()->toast(trans('admin::admin.You do not have permission to edit this admin'), 'error');
            return redirect()->route('show.admins.index');
        }
        $validated = $request->validated();
        $admin = Admin::withoutTrashed()->findOrFail($id);
        if (isset($validated['avatar'])) {
            $avatar = $validated['avatar'] = $request->file('avatar')->store('Admins/avatars', 'public');
            File::delete(storage_path('app/public/' . $admin->avatar));
        } else {
            $avatar = $admin->avatar;
        }

        if (isset($validated['password'])) {
            $admin->update([
                'password' => Hash::make($validated['password']),
            ]);
        } else {
            unset($validated['password']);
        }
        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'avatar' => $avatar,
            'role_id' => $validated['role_id'],
            'status' => $validated['status'],
        ]);
        alert()->toast(trans('admin::admin.This admin has been successfully updated'), 'success');
        return redirect()->route('show.admins.index');

    }

    public function destroy($id)
    {
        if ($id == 1 | $id == 2) {
            alert()->toast(trans('admin::admin.You do not have permission to edit this admin'), 'error');
            return redirect()->route('show.admins.index');
        }
        if ($id == auth()->id()) {
            alert()->toast(trans('admin::admin.You do not have permission to delete your account ask the main admin to delete your account'), 'error');
            return redirect()->route('show.admins.index');
        }
        $admin = Admin::withoutTrashed()->findOrFail($id);

        $admin->delete();
        alert()->toast(trans('admin::admin.The admin has been deleted successfully'), 'success');
        return redirect()->route('show.admins.index');
    }
}
