<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\Store\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth Routes
Auth::routes();

// Routes For the Store Front [ For the Customer ]
Route::get('/', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/categories', [StoreController::class, 'categories'])->name('store.categories');
Route::get('/store/products/{id}', [StoreController::class, 'categoryProducts'])->name('category.products');
Route::get('/store/product/{id}', [StoreController::class, 'productDetails'])->name('product.details');
// Don't forget to Make a Middleware for this Add-to-Cart Route
Route::post('/add-to-cart', [CartController::class, 'addCartItem'])->name('cart.add');

Route::group(['middleware' => ['auth']], function () {
    Route::get('store/view-cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('store/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('cart.item.delete');
    Route::post('store/update-cart-item', [CartController::class, 'updateCartItem'])->name('cart.item.update');
    Route::get('store/cart-checkout', [CustomerOrder::class, 'checkout'])->name('cart.checkout');
    Route::post('store/order-confirm', [CustomerOrder::class, 'confirmOrder'])->name('order.confirm');
    Route::get('/store/all-orders', [CustomerOrder::class, 'allOrders'])->name('orders.all');
    Route::get('/store/order-details/{id}', [CustomerOrder::class, 'orderDetails'])->name('order.details');
});


//  Home View Comes From Laravel/Ui Package
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Below Are Links For the "Admin"
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');
    // TODO : Make the PUT instead of post ?
    Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::resource('/products', ProductController::class);
});
// TODO : Product Owner Middleware  / Show Only His Stuff and Check That On each CRUD
// https://stackoverflow.com/questions/28729228/laravel-5-resourceful-routes-plus-middleware
// TODO : Remove the Show Link From Resource
