<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;



Route::get('/',HomeController::class)->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/contact', 'contact')->name('contact');
Route::get('view-products',[ProductController::class,'index'])->name('view-products' );
Route::get('product/{id}',[ProductController::class,'getProductDetails'])->name('products.show');
Route::get('filter-products/{cateId}',[ProductController::class,'filterProducts'])->name('filter-products');
Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::delete('wishlist/remove/{productId}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::put('cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('panel.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('panel')->name('panel.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::post('/products/bulk-deactivate', [AdminProductController::class, 'bulkDeactivate'])->name('products.bulk-deactivate');
    Route::post('/products/bulk-delete', [AdminProductController::class, 'bulkDelete'])->name('products.bulk-delete');
    Route::post('/products/bulk-restore', [AdminProductController::class, 'bulkRestore'])->name('products.bulk-restore');
    Route::delete('/products/bulk-force-delete', [AdminProductController::class, 'bulkForceDelete'])->name('products.bulk-force-delete');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::delete('/products/{id}/force', [AdminProductController::class, 'forceDelete'])->name('products.force-delete');
    Route::post('/products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
    Route::post('/products/{id}/toggle-active', [AdminProductController::class, 'toggleActive'])->name('products.toggle-active');

    Route::get('/orders', [App\Http\Controllers\Admin\AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('/customers', [App\Http\Controllers\Admin\AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{id}', [App\Http\Controllers\Admin\AdminCustomerController::class, 'show'])->name('customers.show');

    Route::get('/settings', [App\Http\Controllers\Admin\AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\Admin\AdminSettingController::class, 'update'])->name('settings.update');
});
