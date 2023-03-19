<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(7);
        return view('products.index', ['products' => $products])->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'title' => 'required',
            'ImgPath' => 'required',
            'Description' => 'required',
            'prix' => 'required',
            'Qte' => 'required',
        ]);

        $file_ext = $request->ImgPath->getClientOriginalExtension();
        $file_name = "product_" . time() . "_" . $request->title . "." . $file_ext;
        $path = 'uploads';
        $request->ImgPath->move($path, $file_name);
        // create a new product
        Product::create($request->all());
        // redirect the user and send friendly message
        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // validate the input
        $request->validate([
            'title' => 'required',
            'ImgPath' => 'required',
            'Description' => 'required',
            'prix' => 'required',
            'Qte' => 'required',
        ]);
        // create a new product
        $product->update($request->all());
        // redirect the user and send friendly message
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
