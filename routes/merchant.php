<?php

use App\Http\Controllers\Merchant\MerchantController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isMerchant']], function () {

    Route::get('/merchant/home', [MerchantController::class, 'home'])->name('merchant.index');
    Route::get('/merchant/products', [MerchantController::class, 'allProducts'])->name('merchant.products');


    Route::get('/merchant/product/{slug}', [MerchantController::class, 'viewProduct'])->name('merchant.product.view');
    Route::get('/merchant/product/create/new', [MerchantController::class, 'createProduct'])->name('merchant.product.create');



    Route::post('/merchant/product/update', [MerchantController::class, 'updateProduct'])->name('merchant.panel.update.product');

    Route::post('/merchant/profile/update', [MerchantController::class, 'updateMerchantProfile'])->name('update.profile.merchant');

    Route::post('/merchant/product/store', [MerchantController::class, 'storeProduct'])->name('merchant.product.store');
    Route::get('/merchant/related-orders', [MerchantController::class, 'relatedOrders'])->name('merchant.related.order');
    Route::get('/merchant/related-items-counter', [MerchantController::class, 'relatedItemsCounter'])->name('merchant.related.items.counter');
});
// merchant.panel ...etc
