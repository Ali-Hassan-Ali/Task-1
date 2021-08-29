<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::where('parent_id',null)->get();

        return view('home.categorys.index',compact('categorys'));
        
    }//end of index

    public function show($id)
    {

        $categorys = Category::with('children')->where('parent_id',$id)->get();

        return response()->json($categorys);
        
    }//end of show 

}//end of controller
