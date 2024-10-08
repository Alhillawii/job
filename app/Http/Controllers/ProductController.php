<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsfromDB=product::all();
      return view("products.index",['products'=> $productsfromDB] );
      // return view('products.index');}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $category= category::all();
        // return view('categories.create');
        return view('products.create' ,  ['category' => $category]);
        
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required | max:255',
            'price' => 'required | numeric',
            'description' => 'required | max:255',
           'category'=>'required','exists:categories,id']);
            Product::create($validatedData);
            $title = request()->name;
            $description = request()->description;
            $price = request()->price;
            $category = request()->category;

            Product::create([
                'name'=>$title,
                'description'=>$description,
                'price'=>$price,
                'category_id'=>$category
            ]);
        return to_route('products.index')->with ('success' , 'product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product){
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product){
        $validatedData = $request->validate([
            'name' => 'required | max:255',
            'price' => 'required | numeric',
            'description' => 'required | max:255',]);

        $product->update($validatedData);
        return to_route('products.index')->with('success' , 'product updated successfully');

  }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
  
      }
  }

