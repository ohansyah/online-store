<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductController;
use App\Livewire\AppHome;
use App\Livewire\App\Banner as AppBanner;
use App\Livewire\App\BannerDetail as AppBannerDetail;
use App\Livewire\App\Page as AppPage;
use App\Livewire\App\Product as AppProduct;
use App\Livewire\App\ProductDetail;
use App\Livewire\Banner;
use App\Livewire\Category;
use App\Livewire\Forms\BannerForm;
use App\Livewire\Forms\CategoryForm;
use App\Livewire\Forms\PageForm;
use App\Livewire\Forms\ProductForm;
use App\Livewire\Forms\ProductSectionForm;
use App\Livewire\Page;
use App\Livewire\Product;
use App\Livewire\ProductSection;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'web',
])->group(function () {
    Route::get('/', AppHome::class)->name('app.home');

    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', AppBanner::class)->name('app.banner.index');
        Route::get('/{id}', AppBannerDetail::class)->name('app.banner.detail');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', AppProduct::class)->name('app.product.index');
        Route::get('/{id}', ProductDetail::class)->name('app.product.detail');
    });

    Route::group(['prefix' => 'page'], function () {
        Route::get('/{title}', AppPage::class)->name('app.page.detail');
    });
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

    Route::get('/product-section', ProductSection::class)->name('product-section.index');
    Route::get('/product-section/{sectionName}', ProductSectionForm::class)->name('product-section.edit');

    Route::get('/category', Category::class)->name('category.index');
    Route::get('/category/create', CategoryForm::class)->name('category.create');
    Route::get('/category/edit/{categoryId}', CategoryForm::class)->name('category.edit');
    Route::delete('/category/delete/{categoryId}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/banner', Banner::class)->name('banner.index');
    Route::get('/banner/create', BannerForm::class)->name('banner.create');
    Route::get('/banner/edit/{bannerId}', BannerForm::class)->name('banner.edit');
    Route::delete('/banner/delete/{categoryId}', [BannerController::class, 'delete'])->name('banner.delete');

    Route::get('/page', Page::class)->name('page.index');
    Route::get('/page/edit/{pageId}', PageForm::class)->name('page.edit');

    Route::get('/general-setting/clear/{key}', [GeneralSettingController::class, 'clear'])->name('general-setting.clear');
    Route::get('/general-setting', [GeneralSettingController::class, 'index'])->name('general-setting.index');
});
