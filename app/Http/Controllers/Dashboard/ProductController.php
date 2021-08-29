<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();

        return view('dashboard.products.index',compact('products'));

    }//end of index


    public function create()
    {
        $categories = Category::all();

        return view('dashboard.products.create',compact('categories'));
    }//end of create


    public function store(Request $request)
    {

        $request->validate([
            'name_ar'      => ['required','max:255'],
            'name_en'      => ['required','max:255'],
            'categorys_id' => ['required','array','numeric']
        ]);

        try {

            $request_data         = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request['name_ar'], 'en' => $request['name_en']];

            $products = Product::create($request_data);
            $products->categorys()->sync($request->categorys_id);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('dashboard.products.edit',compact('product','categories'));
    }//end of edit


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_ar'      => ['required','max:255'],
            'name_en'      => ['required','max:255'],
            'categorys_id' => ['required','array','numeric']
        ]);

        try {

            $request_data         = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request['name_ar'], 'en' => $request['name_en']];

            $product->update($request_data);

            $product->categorys()->sync($request->categorys_id);

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.products.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(Product $product)
    {
        try {

            $product->delete();
            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.products.index');

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of destroy

}//end of controller
