<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OauthController;
use App\Livewire\Cashier;
use App\Livewire\Category;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\ProductForm;
use App\Livewire\Order;
use App\Livewire\OrderDetail;
use App\Livewire\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderExportController;
use App\Livewire\AppHome;

Route::get('/', AppHome::class)->name('app.home');
Route::get('/promo', function() {
    return json([
        'message' => 'Welcome to the Promo Page!'
    ]);
} )->name('app.promo');
Route::get('/delivery', function() {
    return json([
        'message' => 'Welcome to the delivery Page!'
    ]);
} )->name('app.delivery');
Route::get('/info', function() {
    return json([
        'message' => 'Welcome to the info Page!'
    ]);
} )->name('app.info');


// Oauth
Route::group(['middleware' => 'web'], function () {
    Route::get('/oauth/google', [OauthController::class, 'handleOauthGoogle'])->name('oauth.google');
    Route::get('/oauth/google/callback', [OauthController::class, 'handleOauthGoogleCallback']);
});

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

    Route::get('/cashier', Cashier::class)->name('cashier.index');

    Route::get('/order', Order::class)->name('order.index');
    Route::get('/order/{id}', OrderDetail::class)->name('order.show');

    Route::get('/order/{order}/receipt/print', [OrderExportController::class, 'print'])->name('order.print');
    Route::get('/order/{order}/receipt/pdf', [OrderExportController::class, 'downloadPdf'])->name('order.pdf');
    Route::get('/order/{order}/receipt/image', [OrderExportController::class, 'downloadImage'])->name('order.image');

    Route::get('/general-setting/clear/{key}', [GeneralSettingController::class, 'clear'])->name('general-setting.clear');
    Route::get('/general-setting', [GeneralSettingController::class, 'index'])->name('general-setting.index');
});
