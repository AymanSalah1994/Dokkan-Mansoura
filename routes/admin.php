<?php
// Routes for the Admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('dashboard/add-category', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('dashboard/add-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('dashboard/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('dashboard/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');
    // TODO : Make the PUT instead of post ?
    Route::post('dashboard/delete-category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::resource('dashboard/products', ProductController::class);

    Route::get('/dashboard/all-orders', [OrderController::class, 'allOrders'])->name('admin.orders.all');
    Route::get('/dashboard/checked-orders', [OrderController::class, 'checkedOrders'])->name('admin.orders.checked');
    Route::get('/dashboard/in-preparation-orders', [OrderController::class, 'preparedOrders'])->name('admin.orders.prepared');

    Route::get('/dashboard/all-users', [UsersController::class, 'allUsers'])->name('admin.users.all');
    Route::get('/dashboard/all-customers', [UsersController::class, 'allCustomers'])->name('admin.users.customers');
    Route::get('/dashboard/all-merchants', [UsersController::class, 'allMerchants'])->name('admin.users.merchants');
    Route::get('/dashboard/all-dealers', [UsersController::class, 'allDealers'])->name('admin.users.dealers');

});
