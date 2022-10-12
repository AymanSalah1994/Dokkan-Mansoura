<?php

use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('send-mail', [MailController::class, 'index'])->name('notify.with.email');
// TODO
// Make it Post With Moore Complexity
// Route::Controller(OrderController::class)->group(function () {
// });
