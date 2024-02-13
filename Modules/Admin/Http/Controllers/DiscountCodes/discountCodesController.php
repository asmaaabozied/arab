<?php

namespace Modules\Admin\Http\Controllers\DiscountCodes;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreNewDiscountCodeRequest;
use Modules\Admin\Http\Requests\UpdateDiscountCodeRequest;
use Modules\DiscountCode\Entities\DiscountCode;

class discountCodesController extends Controller
{
  public function index(){
      $page_name = "ArabWorkers|Admin - discountCodes";
      $main_breadcrumb = "Admin Panel";
      $sub_breadcrumb = "discountCodes";
      $data = DiscountCode::withoutTrashed()->orderByDesc('created_at')
         ->get();
      return view('admin::layouts.discountCode.index', compact(
          [
              'page_name',
              'data',
              'main_breadcrumb',
              'sub_breadcrumb',
          ]
      ));
  }
    public function showCreateDiscountCodeFrom()
    {
        $page_name = 'ArabWorkers|Admin - DiscountCodes -  Create New discountCode';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "DiscountCodes - Create New discountCode";
        return view('admin::layouts.discountCode.createNewDiscountCode', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
        ]));
    }

    public function storeNewDiscountCode(StoreNewDiscountCodeRequest $request){
        $validated = $request->validated();
        DiscountCode::create([
            'code' => $validated['code'],
            'type' => $validated['type'],
            'max_uses' => $validated['max_uses'],
            'count_of_uses'=> 0,
            'discount_amount' => $validated['discount_amount'],
            'starts_at' =>  $validated['starts_at'],
            'expires_at' => $validated['expires_at'],
            'description' =>$validated['description'],
        ]);
        alert()->toast(trans('admin::admin.The Discount Code has been created successfully'), 'success');
        return redirect()->route('admin.discountCodes.index');
    }
    public function showEditDiscountCodeForm($id)
    {
        $page_name = 'ArabWorkers|Admin - DiscountCodes -  Update discountCode';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "DiscountCodes - Update discountCode";
        $data = DiscountCode::withoutTrashed()->findOrFail($id);
        return view('admin::layouts.discountCode.editDiscountCode', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));
    }

    public function updateDiscountCode(UpdateDiscountCodeRequest $request, $id){
        $validated = $request->validated();
        $discountCode = DiscountCode::withoutTrashed()->findOrFail($id);
        $discountCode->update([
            'code' => $validated['code'],
            'type' => $validated['type'],
            'max_uses' => $validated['max_uses'],
            'count_of_uses'=> 0,
            'discount_amount' => $validated['discount_amount'],
            'starts_at' =>  $validated['starts_at'],
            'expires_at' => $validated['expires_at'],
            'description' =>$validated['description'],
        ]);
        alert()->toast(trans('admin::admin.The Discount Code has been updated successfully'), 'success');
        return redirect()->route('admin.discountCodes.index');
    }

}
