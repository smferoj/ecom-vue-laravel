<?php

namespace App\Http\Controllers\Admin;

use Stringable;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Product_image;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   
    public function index(){
        $products = Product::with('category','brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Category::get();
        return Inertia::render('Admin/Product/Index', ['products' => $products, 'brands'=> $brands, 'categories'=>$categories]);
    }


    public function store(Request $request){
        // dd($request->file('product_images'));
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        if($request->hasFile('product_images')){
            $productImages = $request->file('product_images');

            foreach($productImages as $image){
                $uniqueName = time(). '-' . Str::random(10). '.' . $image->getClientOriginalExtension();
                $image->move('product_images', $uniqueName);
                Product_image::create([
                   'product_id' => $product->id,
                   'image' => 'product_images/' . $uniqueName
                ]);
            }
        }
      
        return Inertia::location(route('admin.products.index'), ['success' => 'Product created successfully']);
    }


    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        // dd($product);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        // Check if product images were uploaded
        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');
            // Loop through each uploaded image
            foreach ($productImages as $image) {
                // Generate a unique name for the image using timestamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                // Store the image in the public folder with the unique name
                $image->move('product_images', $uniqueName);

                // Create a new product image record with the product_id and unique name
                Product_image::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        $product->update();
        return Inertia::location(route('admin.products.index'), ['success' => 'Product upated successfully']);
    }

    public function deleteImage($id)
    {
        $image = Product_image::where('id', $id)->delete();
        return Inertia::location(route('admin.products.index'), ['success' => 'Product image deleted successfully']);
    }

    
    public function destory($id)
    {
        $product = Product::findOrFail($id)->delete();
        return Inertia::location(route('admin.products.index'), ['success' => 'Product deleted successfully']);
    }

}
