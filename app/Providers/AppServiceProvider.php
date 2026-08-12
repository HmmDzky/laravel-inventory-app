<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.navigation', function ($view) {
            $criticalProducts = Product::select('id', 'title', 'stock')
                ->where('stock', '<=', 5)
                ->orderBy('stock', 'asc')
                ->get();

            $criticalCount = $criticalProducts->count();

            $view->with([
                'criticalProducts' => $criticalProducts,
                'criticalCount' => $criticalCount,
            ]);
        });
    }
}
