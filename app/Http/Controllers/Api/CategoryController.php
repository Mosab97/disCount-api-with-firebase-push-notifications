<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response()->json(['status' => TRUE ,'messag' => 'Done' , 'data' => $categories ]);
    }
}
