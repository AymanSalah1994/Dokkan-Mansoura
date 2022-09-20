<?php
// Routes for the Admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
});
