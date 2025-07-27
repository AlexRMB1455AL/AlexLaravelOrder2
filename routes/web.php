<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/order', function () {
    return view('order');
});
// Route::get('/statistic', function () {
//     return view('statistic');
// });
Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
Route::get('/statistic', [OrderController::class, 'stats'])->name('orders.stats');
Route::post('/statisticproviders', [OrderController::class, 'stats_provider'])->name('orders.statsprovider');
Route::get('/order', [OrderController::class, 'show_provider'])->name('orders.showprovider');