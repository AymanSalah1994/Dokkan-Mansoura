<?php
// Routes for the Admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RefundOrderController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // CATEGORY  - START
    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/dashboard/add-category', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/dashboard/add-category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/dashboard/edit-category/{id}/{slug}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/dashboard/update-category/', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('dashboard/delete-category/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    // CATEGORY  - END

    // PRODUCT  - START
    Route::resource('dashboard/products', ProductController::class);
    // PRODUCT  - END


































    Route::get('/dashboard/all-orders', [OrderController::class, 'allOrders'])->name('admin.orders.all');
    Route::get('/dashboard/view-order/{id}', [OrderController::class, 'viewOrder'])->name('admin.order.view');
    Route::post('/dashboard/delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('admin.order.delete');
    Route::get('/dashboard/checked-orders', [OrderController::class, 'checkedOrders'])->name('admin.orders.checked');
    Route::post('/dashboard/mark-order-prepared/{id}', [OrderController::class, 'prepareOrder'])->name('admin.order.prepare');
    Route::post('/dashboard/mark-order-done/{id}', [OrderController::class, 'doneOrder'])->name('admin.order.done');
    Route::get('/dashboard/in-preparation-orders', [OrderController::class, 'preparedOrders'])->name('admin.orders.prepared');

    Route::get('/dashboard/all-users', [UsersController::class, 'allUsers'])->name('admin.users.all');
    Route::get('/dashboard/all-customers', [UsersController::class, 'allCustomers'])->name('admin.users.customers');
    Route::get('/dashboard/all-merchants', [UsersController::class, 'allMerchants'])->name('admin.users.merchants');
    Route::get('/dashboard/all-dealers', [UsersController::class, 'allDealers'])->name('admin.users.dealers');

    Route::post('/dashboard/user/to-merchant/', [UsersController::class, 'toMerchant'])->name('admin.user.to.merchant');
    Route::post('/dashboard/user/to-dealer/', [UsersController::class, 'toDealer'])->name('admin.user.to.dealer');
    Route::post('/dashboard/user/revoke/', [UsersController::class, 'revoke'])->name('admin.user.revoke');
    Route::post('/dashboard/user/delete/', [UsersController::class, 'userDelete'])->name('admin.user.delete');
    Route::get('/dashboard/user/view/{id}', [UsersController::class, 'userView'])->name('admin.user.view');


    Route::get('/dashboard/all-done-orders', [RefundOrderController::class, 'allDoneOrders'])->name('orders.done');

    Route::get('/dashboard/all-refunded-orders', [RefundOrderController::class, 'allRefundedOrders'])->name('orders.refunded');

    Route::get('/dashboard/refund-order-details/{id}', [RefundOrderController::class, 'refundOrderDetails'])->name('refund.order.details');

    Route::post('/dashboard/refund-whole-order/{id}', [RefundOrderController::class, 'refundOrder'])->name('refund.whole.order');
    // In Post Methods you Don't need to pass Data to URLs if you want  ;
    Route::post('/dashboard/refund-order-item/', [RefundOrderController::class, 'refundItem'])->name('refund.order.item');
});
