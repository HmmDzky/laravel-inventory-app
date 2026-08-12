<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {

    $totalProducts = Product::count();

    $totalStock = Product::sum('stock');

    $totalAsset = Product::all()->sum(function ($product) {
        return $product->price * $product->stock;
    });

    $criticalStocks = Product::orderBy('stock', 'asc')
        ->take(5)
        ->get(['title', 'stock']);

    $categoriesChart = Category::withCount('products')
        ->get(['name', 'products_count']);

    return view('dashboard', compact(
        'totalProducts',
        'totalStock',
        'totalAsset',
        'criticalStocks',
        'categoriesChart'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('/products', ProductController::class);

    Route::post(
        '/products/{product}/transactions',
        [TransactionController::class, 'store']
    )->name('transactions.store');

    Route::middleware('admin')->group(function () {

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::patch('/users/{id}/toggle-role', [UserController::class, 'toggleRole'])
            ->name('users.toggleRole');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::resource('categories', CategoryController::class);
    });
});

require __DIR__ . '/auth.php';
