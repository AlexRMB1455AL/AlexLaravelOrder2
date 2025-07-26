<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/statistic', function () {
    return view('statistic');
});
