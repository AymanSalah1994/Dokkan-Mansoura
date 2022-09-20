<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CountingController;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\Store\StoreController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth']], function () {
    Route::get('store/view-cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('store/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('cart.item.delete');
    Route::post('store/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('store/update-cart-item', [CartController::class, 'updateCartItem'])->name('cart.item.update');
    Route::get('store/cart-checkout', [CustomerOrder::class, 'checkout'])->name('cart.checkout');
    Route::post('store/order-confirm', [CustomerOrder::class, 'confirmOrder'])->name('order.confirm');
    Route::get('store/all-orders', [CustomerOrder::class, 'allOrders'])->name('orders.all');
    Route::get('store/order-details/{id}', [CustomerOrder::class, 'orderDetails'])->name('order.details');
    Route::get('store/view-wish-list', [CartController::class, 'viewWishList'])->name('wish.list.view');
    Route::post('store/delete-wish-list-item', [CartController::class, 'deleteWishListItem'])->name('wish.list.item.delete');

    Route::get('profile/view-profile', [ProfileController::class, 'viewProfile'])->name('profile.view');
    Route::post('/profile/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::post('store/cancel-order', [CustomerOrder::class, 'cancelOrder'])->name('order.cancel');
    Route::post('store/return-order-to-cart', [CustomerOrder::class, 'returnOrderToCart'])->name('return.order.to.cart');
});

Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/categories', [StoreController::class, 'categories'])->name('store.categories');
Route::get('/store/products/{id}', [StoreController::class, 'categoryProducts'])->name('category.products');
Route::get('/store/product/{id}', [StoreController::class, 'productDetails'])->name('product.details');
// Don't forget to Make a Middleware for this Add-to-Cart Route
Route::post('/add-to-cart', [CartController::class, 'addCartItem'])->name('cart.add');
Route::post('/add-to-wish-list', [CartController::class, 'addWishListItem'])->name('wish-list.add');
Route::get('/store/cart-count', [CountingController::class, 'cartCount'])->name('cart.counter');
Route::get('/store/wish-list-count', [CountingController::class, 'wishListCount'])->name('wish.list.counter');
