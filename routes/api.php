<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/userget', function(Request $request) {
    return $request->user();
});

Route::post('/groups', [App\Http\Controllers\CustomAuthController::class,'Groups']);
Route::post('/registration/{data}', [App\Http\Controllers\CustomAuthController::class,'Registration']);
Route::post('/login/{data}', [App\Http\Controllers\CustomAuthController::class,'Login']);
Route::post('/logout', [App\Http\Controllers\CustomAuthController::class,'Logout']);

// Route::get('/userget', [App\Http\Controllers\CustomAuthController::class,'Userget']);
