<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('confirm/{id}/{url}', [\App\Http\Controllers\CustomAuthController::class, 'ConfirmEmail']);

Route::get('{path}', function() {
    return view('app');
})->where('path', '.*');