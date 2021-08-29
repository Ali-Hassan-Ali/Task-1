<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products  = Product::all();
        $categorys = Category::with('children')->get();

        return view('home.products.index',compact('products','categorys'));

    }//end of index

    public function store(Request $request)
    {

        $request->validate([
            'name_ar'      => ['required','max:255'],
            'name_en'      => ['required','max:255'],
            // 'categorys_id' => ['array'],
        ]);

        try {

            $request_data         = $request->except(['name_ar','name_en']);
            $request_data['name'] = ['ar' => $request['name_ar'], 'en' => $request['name_en']];

            $products = Product::create($request_data);
            $products->categorys()->sync($request->categorys_id);

            return response()->json($products);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    public function destroy($id)
    {
        try {

            $product = Product::find($id);
            $product->delete();
            return response()->json($product);

         } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
        
    }//end of destroy

}//end of controller
