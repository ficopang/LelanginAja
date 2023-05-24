<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Watchlist;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        $carousel = Product::inRandomOrder()->limit(4)->get();
        $smallBanner = Product::inRandomOrder()->limit(1)->get()->first();

        $categories = Category::all()->take(6);

        $trendingProduct = Product::withCount('bids')
            ->orderBy('bids_count', 'desc')
            ->take(8)
            ->get();

        $specialOffer = Product::orderBy('start_time', 'asc')->limit(3)->get();
        $banner = Product::inRandomOrder()->limit(1)->get()->first();
        $offer = Product::inRandomOrder()->limit(1)->get()->first();

        $bestSellers = Product::inRandomOrder()->limit(3)->get();
        $newArrivals = Product::orderBy('created_at', 'asc')->limit(3)->get();
        $topRated = Product::inRandomOrder()->limit(3)->get();

        return view('index', compact('carousel', 'smallBanner', 'categories', 'trendingProduct', 'specialOffer', 'banner', 'offer', 'bestSellers', 'newArrivals', 'topRated'));
    }

    public function index()
    {
        $products = Product::paginate(2);
        $categories = Category::all();
        return view('product.manage', compact('products', 'categories'));
    }

    public function filterCategory($categoryId)
    {
        $products = Category::findOrFail()->products();

        return view('products.search', ['products' => $products]);
    }

    public function list(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category_id');

        $products = Product::query();
        $categories = Category::all();

        if ($query) {
            $products->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%");
            });
        }

        if ($categoryId != 'none') {
            $products->where('category_id', $categoryId);
        }

        if (!$query && !$categoryId) {
            $products->whereNotNull('id'); // Include all products
        }

        $products = $products->paginate(6);

        return view('product.product-grids', compact('products', 'query', 'categoryId', 'categories'));
    }

    public function detail($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.product-details', compact('product', 'product'));
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
        $products->user_id = auth()->id();
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

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

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

        $product->name = $request->input('product-name');
        $product->category_id = $request->input('category');
        $product->description = $request->input('product-description');
        $product->starting_price = $request->input('starting-price');
        $product->min_bid_increment = $request->input('min-bid-increment');

        if ($request->hasFile('product-image')) {
            $image = $request->file('product-image');
            $imagePath = $image->store('product-images', 'public');
            $product->image_url = $imagePath;
        }
        $product->start_time = $validatedData['start-time'];
        $product->end_time = $validatedData['end-time'];


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

    public function toggleWatchlist($productId)
    {
        try {
            $product = Product::findOrFail($productId);

            $watchlist = Watchlist::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            if ($watchlist) {
                $watchlist->delete();
            } else {
                $watchlist = new Watchlist();
                $watchlist->user_id = auth()->id();
                $watchlist->product_id = $product->id;
                $watchlist->save();
            }
        } catch (ModelNotFoundException $exception) {
            // Handle the case when the product is not found
            // You can redirect or show an error message
        }

        return back();
    }
}
