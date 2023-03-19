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
            'prix' => 'required',
            'Qte' => 'required',
        ]);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file_ext = $request->ImgPath->getClientOriginalExtension();
            $file_name = "product_"  . $request->title . '_' . $request->id . "." . $file_ext;
            $path = 'uploads';
            $request->ImgPath->move($path, $file_name);
            $ImgPath = $path . '/' . $file_name;
        } else {
            $ImgPath = "null";
        }
        Product::create([
            'title' => $request->title,
            'ImgPath' => $ImgPath,
            'Description' => $request->Description ?? "-",
            'prix' => $request->prix,
            'Qte' => $request->Qte,
        ]);
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
    // public function update(Request $request, Product $product)
    // {

    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'prix' => 'required',
    //         'Qte' => 'required',
    //         'ImgPath' => 'nullable|image',
    //     ]);

    //     $productData = [
    //         'title' => $validatedData['title'],
    //         'prix' => $validatedData['prix'],
    //         'Qte' => $validatedData['Qte'],
    //         'Description' => $request->input('Description', 'None'),
    //     ];

    //     if (isset($validatedData['ImgPath']) && $request->file('ImgPath')->isValid()) {
    //         $imagePath = $request->file('ImgPath')->storeAs(
    //             'uploads',
    //             'product_' . time() . '_' . $request->title . '.' . $request->file('ImgPath')->getClientOriginalExtension(),
    //             'public'
    //         );
    //         $productData['ImgPath'] = $imagePath;
    //     }

    //     $product->update($productData);

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Product updated successfully.');
    // }
    public function update(Request $request, Product $product)
    {
        // validate the input
        $request->validate([
            'title' => 'required',
            'prix' => 'required',
            'Qte' => 'required',
        ]);

        if ($request->hasFile('ImgPath')) {
            $file = $request->file('ImgPath');

            // Generate a unique filename
            $filename = 'product_' . $request->title . '_' . $request->id . '.' . $file->getClientOriginalExtension();

            // Move the file to the target directory
            $file->move(public_path('uploads'), $filename);

            // Set the image path for the product
            $imgpath = 'uploads/' . $filename;
        } else {
            $imgpath =  $product->ImgPath;
        }
        // get the image path from the request

        // create a new product
        $product->update([
            'title' => $request->title,
            'ImgPath' => $imgpath,
            'Description' => $request->Description ?? "-",
            'prix' => $request->prix,
            'Qte' => $request->Qte,
        ]);

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
