<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('product.manage', compact('products'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product-name' => 'required',
            'category' => 'required',
            'product-description' => 'required',
            'starting-price' => 'required|numeric',
            'min-bid-increment' => 'required|numeric',
            'product-image' => 'required|image',
            'start-time' => 'required|date',
            'end-time' => 'required|date',

        ]);


        $products = new Product();
        $products->name = $validatedData['product-name'];
        $products->user_id = 1;
        $products->category_id = $validatedData['category'];
        $products->description = $validatedData['product-description'];
        $products->starting_price = $validatedData['starting-price'];
        $products->min_bid_increment = $validatedData['min-bid-increment'];


        if ($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $imagePath = $image->store('product-images', 'public');
            $products->image_url = $imagePath;
        }
        $products->start_time = $validatedData['start-time'];
        $products->end_time = $validatedData['end-time'];

        $products->save();


        return redirect()->back()->with('success', 'Product added successfully!');
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->input('product-name');
        $product->category_id = $request->input('category');
        $product->description = $request->input('product-description');
        $product->starting_price = $request->input('starting-price');
        $product->min_bid_increment = $request->input('min-bid-increment');

        $product->save();


        return redirect()->route('products.index', $product->id);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }



}
