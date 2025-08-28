<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductController;
use App\Livewire\AppHome;
use App\Livewire\Category;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\ProductForm;
use App\Livewire\Product;
use App\Livewire\App\ProductDetail;
use App\Livewire\App\Product as AppProduct;
use App\Livewire\App\BannerDetail as AppBannerDetail;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
])->group(function () {
    Route::get('/', AppHome::class)->name('app.home');

    Route::group(['prefix' => 'banner'], function () {
        Route::get('/{id}', AppBannerDetail::class)->name('app.banner.detail');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', AppProduct::class)->name('app.product.index');
        Route::get('/{id}', ProductDetail::class)->name('app.product.detail');
    });
});

Route::get('/promo', function () {
    return json([
        'message' => 'Welcome to the Promo Page!',
    ]);
})->name('app.promo');
Route::get('/delivery', function () {
    return json([
        'message' => 'Welcome to the delivery Page!',
    ]);
})->name('app.delivery');
Route::get('/info', function () {
    return json([
        'message' => 'Welcome to the info Page!',
    ]);
})->name('app.info');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/product', Product::class)->name('product.index');
    Route::get('/product/create', ProductForm::class)->name('product.create');
    Route::get('/product/edit/{productId}', ProductForm::class)->name('product.edit');
    Route::delete('/product/delete/{productId}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/category', Category::class)->name('category.index');
    Route::get('/category/create', CategoryForm::class)->name('category.create');
    Route::get('/category/edit/{categoryId}', CategoryForm::class)->name('category.edit');
    Route::delete('/category/delete/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/general-setting/clear/{key}', [GeneralSettingController::class, 'clear'])->name('general-setting.clear');
    Route::get('/general-setting', [GeneralSettingController::class, 'index'])->name('general-setting.index');
});
