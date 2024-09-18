<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        $products=Product::all();
        return view('product.index',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products= new Product;
        $products->name=$request->name;
        $products->description=$request->description;
        $products->stock=$request->stock;
        $products->price=$request->price;
        $products->category_id=$request->category_id;
        $products->color=$request->color;
        $products->material=$request->material;
        $products->capacidad=$request->capacidad;

        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('product'), $imagename);
            $products->image=$imagename;
        }
        $products->save();
        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Create Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $image_patch=public_path('product/'. $product->image);
        if(file_exists($image_patch)){
            unlink($image_patch);
        }
        $product->delete();
        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Delete Successfully');
        return redirect()->route('product.index');
    }
}
