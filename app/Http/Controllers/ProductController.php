<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return response()->json(['products'=>$products], 200);
    }

    public function show($slug){
        $products = Product::where('slug', $slug)->firstOrFail();
        return response()->json(['products'=>$products], 200);
    }



    public function store(Request $request){

    ///// IF we wanted to just let some users can CURD :    
    /*    
    if (Auth::user()->can('CURD')) {

    }
    */
    
        $request->validate([
            'user_id'=>'required|max:120',
            'title'=>'required|max:120',
            'slug'=>'required|max:120',
            'description'=>'required|max:120',
            'featured_image'=>'required|max:120',
            'category'=>'required|max:120',
        ]);
    
        $product = new Product;
        $product->user_id = $request->user_id;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->featured_image = $request->featured_image;
        $product->category = $request->category;
        $product->deleted_at = $request->deleted_at;
        $product->save();
        return response()->json(['message'=>'Product has been added'],200);

    }

    public function update(Request $request, $id){

        $request->validate([
            'user_id'=>'required|max:120',
            'title'=>'required|max:120',
            'slug'=>'required|max:120',
            'description'=>'required|max:120',
            'featured_image'=>'required|max:120',
            'category'=>'required|max:120',
        ]);
    
        $product = Product::find($id);
        if($product)
        {
        $product->user_id = $request->user_id;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->featured_image = $request->featured_image;
        $product->category = $request->category;
        $product->deleted_at = $request->deleted_at;
        $product->update();
        return response()->json(['message'=>'Product has been Updated !'],200);
        }
        else
        {
        return response()->json(['message'=>'Product Not Found'],404);
        }
}

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message'=>'Product has been Deleted !'],200);
        }
        else
        {
        return response()->json(['message'=>'Product Not Found'],404);
        }
    }



}