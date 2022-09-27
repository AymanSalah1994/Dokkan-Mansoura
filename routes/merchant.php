<?php

use App\Http\Controllers\Merchant\MerchantController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isMerchant']], function () {

    Route::get('/merchant/home', [MerchantController::class, 'home'])->name('merchant.index');

    Route::get('/merchant/products', [MerchantController::class, 'allProducts'])->name('merchant.products');

    Route::get('/merchant/product/{slug}', [MerchantController::class, 'viewProduct'])->name('merchant.product.view');

    Route::post('/merchant/product/update', [MerchantController::class, 'updateProduct'])->name('merchant.update');

    Route::get('/merchant/product/create', [MerchantController::class, 'createProduct'])->name('merchant.product.create');
    Route::post('/merchant/product/create', [MerchantController::class, 'storeProduct'])->name('merchant.product.store');

    Route::get('/merchant/related-orders', [MerchantController::class, 'relatedOrders'])->name('merchant.related.order');
});
