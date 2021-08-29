<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::all();

        return view('dashboard.categorys.index',compact('categorys'));
        
    }//end of index


    public function create()
    {
        $categorys = Category::with('children')->get();

        return view('dashboard.categorys.create',compact('categorys'));
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => ['required','max:255'],
            'name_en' => ['required','max:255']
        ]);

        try {

            $request_data         = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        

            Category::create($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store
    
    public function edit(Category $category)
    {
        return view('dashboard.categorys.edit',compact('category'));
    }//end of edit


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_ar'   => ['required','max:255'],
            'name_en'   => ['required','max:255'],
        ]);

        try {

            $request_data         = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request['name_ar'], 'en' => $request['name_en']];

            $category->update($request_data);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.categoryscategorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//ene od uupdate


    public function destroy(Category $category)
    {
        try {

            $category->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.categorys.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of destroy

}//end of controller
