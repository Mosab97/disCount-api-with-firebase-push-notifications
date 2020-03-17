<?php

namespace App\Http\Controllers\Dashboard;

use App\Advertisement;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name = $request->input('name');
        $categories->save();
        session()->flash('success', __('تم إضافة القسم بنجاح'));
        return redirect()->route('dashboard.categories.index');
    }




    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->save();
        session()->flash('success', __('تم تعديل القسم بنجاح'));
        return redirect()->route('dashboard.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }

}
