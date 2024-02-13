<?php

namespace Modules\Admin\Http\Controllers\Category;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Admin\Http\Requests\StoreNewActionInCategoryRequest;
use Modules\Admin\Http\Requests\StoreNewCategoryRequest;
use Modules\Admin\Http\Requests\UpdateActionOfCategoryRequest;
use Modules\Admin\Http\Requests\UpdateCategoryRequest;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\CategoryAction;

class CategoryController extends Controller
{
    protected function image()
    {
        $default_image = url('assets/img/default/action.png');
        return $default_image;
    }
    public function index()
    {
        $page_name = "ArabWorkers|Admin - Categories";
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Categories";
        $data = Category::withoutTrashed()
            ->withCount(
            [
                'actions',
            ]
        )
            ->get();
        return view('admin::layouts.category.index', compact(
            [
                'page_name',
                'data',
                'main_breadcrumb',
                'sub_breadcrumb',
            ]
        ));
    }

    public function showCreateCategoryFrom()
    {
        $page_name = 'ArabWorkers|Admin - Categories -  Create New Category';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Categories - Create New Category";
        $default_image = $this->image();

        return view('admin::layouts.category.createNewCategory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'default_image',
        ]));
    }

    public function storeNewCategory(StoreNewCategoryRequest $request){
        $validated = $request->validated();
        if (isset($validated['image'])) {
            $image = $validated['image'] = $request->file('image')->store('Categories/Image', 'public');
        } else {
            $image = null;
        }
        $category = Category::create([
            'title' =>$validated['category_en_name'],
            'ar_title' => $validated['category_ar_name'],
            'image' => $image,

        ]);
        for ($i=0;$i<count($validated['CategoryActions']);$i++){
            CategoryAction::create([
                'category_id' => $category->id,
                'name' => $validated['CategoryActions'][$i]['action_en_name'],
                'ar_name' => $validated['CategoryActions'][$i]['action_ar_name'],
                'price' => $validated['CategoryActions'][$i]['action_price'],
            ]);
        }
        alert()->toast(trans('admin::admin.The category and actions has been created successfully'), 'success');
        return redirect()->route('admin.categories.index');

    }
    public function showEditCategoryForm($category){
        $page_name = 'ArabWorkers|Admin - Category -  Edit Category';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Category -  Edit Category";
        $default_image = $this->image();
        $data = Category::withoutTrashed()->findOrFail($category);

        return view('admin::layouts.category.editCategory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'default_image',
            'data',
        ]));
    }

    public function updateCategory(UpdateCategoryRequest $request, $category){
        $validated = $request->validated();
        $category = Category::withoutTrashed()->findOrFail($category);
        if (isset($validated['image'])) {
            $image = $validated['image'] = $request->file('image')->store('Categories/Image', 'public');
            $old_image = $category->image;
            File::delete(storage_path('app/public/' . $old_image));
        } else {
            $image = $category->image;
        }
        $category->update([
            'title' =>$validated['category_en_name'],
            'ar_title' => $validated['category_ar_name'],
            'image' => $image,

        ]);
        alert()->toast(trans('admin::admin.The category has been updated successfully'), 'success');
        return redirect()->route('admin.categories.index');
    }
    public function showActionsOfCategory($category){
        $page_name = 'ArabWorkers|Admin -Actions of Category';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Actions of Category";
        $category = Category::withoutTrashed()->findOrFail($category);
        $data = CategoryAction::withoutTrashed()->where('category_id', $category->id)
            ->withCount('tasks')
            ->get();
//        dd($category, $data);
        return view('admin::layouts.category.actionsOfCategory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
            'category',
        ]));
    }

    public function showEditActionOfCategoryForm($action){
        $page_name = 'ArabWorkers|Admin - Update Action';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Update Action";
        $data = CategoryAction::withoutTrashed()->findOrFail($action);

        return view('admin::layouts.category.editActionOfCategory', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'data',
        ]));
    }
    public function updateActionOfCategory(UpdateActionOfCategoryRequest $request, $action){
        $validated = $request->validated();
        $action = CategoryAction::withoutTrashed()->findOrFail($action);
        $action->update([
            'category_id' => $action->category_id,
            'name' => $validated['name'],
            'ar_name' => $validated['ar_name'],
            'price' => $validated['price'],
        ]);
        alert()->toast(trans('admin::admin.The action has been updated successfully'), 'success');
        return redirect()->route('admin.show.action.of.category',$action->category_id);


    }

    public function showCreateActionInCategoryForm($category){
        $page_name = 'ArabWorkers|Admin - Create Action';
        $main_breadcrumb = "Admin Panel";
        $sub_breadcrumb = "Create Action";
        $category = Category::withoutTrashed()->findOrFail($category);

        return view('admin::layouts.category.createActionOfCategoryForm', compact([
            'page_name',
            'main_breadcrumb',
            'sub_breadcrumb',
            'category',
        ]));
    }

    public function storeNewActionInCategory(StoreNewActionInCategoryRequest $request, $category){
        $validated = $request->validated();
        $category = CategoryAction::withoutTrashed()->findOrFail($category);
        CategoryAction::create([
            'category_id' => $category->id,
            'name' => $validated['name'],
            'ar_name' => $validated['ar_name'],
            'price' => $validated['price'],
        ]);
        alert()->toast(trans('admin::admin.The action has been created successfully'), 'success');
        return redirect()->route('admin.show.action.of.category',$category->id);

    }
}
