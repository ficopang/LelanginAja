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

        // Store the product in the database
        $products = new Product();
        $products->name = $validatedData['product-name'];
        $products->user_id = 1;
        $products->category_id = $validatedData['category'];
        $products->description = $validatedData['product-description'];
        $products->starting_price = $validatedData['starting-price'];
        $products->min_bid_increment = $validatedData['min-bid-increment'];
        // Handle product image upload and store the image URL in the database
        if ($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $imagePath = $image->store('product-images', 'public');
            $products->image_url = $imagePath;
        }
        $products->start_time = $validatedData['start-time'];
        $products->end_time = $validatedData['end-time'];


        // Save the product
        $products->save();

        // Redirect the user or return a response
        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
