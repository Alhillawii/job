<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.idex' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('products.creste');
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
          ]);
          Product::create($validatedData);
          return to_route('products.index')->with ('success' , 'product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required | max:255',
            'price' => 'required | numeric',
            'description' => 'required | max:255',
          ]);

          $product->update($validatedData);
          return to_route('products.index')->with('success' , 'product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');

    }
}
