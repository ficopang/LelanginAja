<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
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

            $view->with('categories', $categories); // Pass the data to the template
        }); // Replace 'your.template' with the actual template path
    }
}
