<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;



class SubCategoryController extends Controller
{

    public function index_SubCategory($id_category)
    {
        $sto_get = SubCategory::where('category_id',$id_category)->get();
        return response()->json(['status' => TRUE ,'messag' => 'Done' , 'data' => $sto_get ]);
    }

    public function index_SubCategory_all()
    {
        $sto_ = SubCategory::get();
        return response()->json(['status' => TRUE ,'messag' => 'Done' , 'data' => $sto_]);
    }


    public function search_SubCategory(Request $request)
    {
        $data = $request->get('data');
        $SubCategory = SubCategory::where('name', 'like',"%{$data}%")->get();
        return response()->json(['status' => TRUE ,'messag' => 'Done' , 'data' => $SubCategory]);

    }




}
