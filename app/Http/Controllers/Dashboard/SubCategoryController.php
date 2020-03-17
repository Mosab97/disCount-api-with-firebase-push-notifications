<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index(Request $request)
    {
        $markets = SubCategory::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);
        return view('dashboard.markets.index', compact('markets'));
    }





    public function create()
    {
        $categories = Category::get();
        return view('dashboard.markets.create', compact('categories'));

    }


    public function store(Request $request)
    {
        $path = $request->image->store('markets');
        $subCategory = new SubCategory();
        $subCategory->name = $request->input('name');
        $subCategory->coupon = $request->input('coupon');
        $subCategory->discount = $request->input('discount');
        $subCategory->url = $request->input('url');
        $subCategory->image =  $path;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
        return redirect()->route('dashboard.markets.index');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::get();
        return view('dashboard.markets.edit', compact('subCategory','categories'));

    }

    public function update(Request $request, SubCategory $subCategory)
    {

        if (request()->has('image')) {
            $image_= $request->image->store('markets');
            $subCategory->image = $image_;

        }

        $subCategory->name = $request->input('name',$subCategory->name);
        $subCategory->coupon = $request->input('coupon',$subCategory->coupon);
        $subCategory->discount = $request->input('discount',$subCategory->discount);
        $subCategory->url = $request->input('url',$subCategory->url);
        $subCategory->category_id = $request->input('category_id',$subCategory->category_id);
        $subCategory->save();
        return redirect()->route('dashboard.markets.index');

    }



    public function destroy(SubCategory $subCategory)
    {

        $subCategory->delete();
        session()->flash('success', __('تم الحذف بنجاح'));
        return redirect()->route('dashboard.markets.index');
    }



}
