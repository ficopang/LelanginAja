<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use the `view` method to specify the template(s) you want to pass data to
        View::composer('template.generic', function ($view) {
            $categories = Category::all(); // Retrieve data from your model
            $userId = auth()->id();
            $wonProducts = Product::whereHas('bids', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
                ->whereDoesntHave('transaction')
                ->where('end_time', '<', Carbon::now()->addHours(7))
                ->get();

            $totalBidAmount = $wonProducts->sum(function ($product) {
                return $product->getTotalBidAmount();
            });

            $view->with('categories', $categories)->with('wonProducts', $wonProducts)->with('totalBidAmount', $totalBidAmount); // Pass the data to the template
        }); // Replace 'your.template' with the actual template path
    }
}
