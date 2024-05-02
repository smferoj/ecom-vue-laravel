<?php

namespace App\Http\Controllers\Admin;

use Stringable;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product_image;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   
    public function index(){
        $products = Product::get();
        $brands = Brand::get();
        $categories = Category::get();
        return Inertia::render('Admin/Product/Index', ['products' => $products, 'brands'=> $brands, 'categories'=>$categories]);
    }


    public function store(Request $request){
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        // if($request->hasFile('product_images')){
        //     $productImages = $request->file('product_images');
        //     foreach($productImages as $image){
        //         $uniqueName = time(). '-' . Str::random(10). '.' . $image->getClientOriginalExtension();
        //         $image->move('product_images', $uniqueName);
        //         Product_image::create([
        //            'product_id' => $product->id,
        //            'image' => 'product_images/' . $uniqueName
        //         ]);

        //     }
        // }
     
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');


    }
}
