<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// old one
// Route::middleware('auth:sanctum')->get('/userget', function(Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->get('/userget', [App\Http\Controllers\CustomAuthController::class,'Userget'] );
Route::get('/userget',                  [App\Http\Controllers\CustomAuthController::class,'Userget'] );
Route::post('/editUser',                [App\Http\Controllers\MainController::class,'EditUser'] );

Route::post('/groups',                  [App\Http\Controllers\CustomAuthController::class,'Groups']);
Route::post('/registration/{data}',     [App\Http\Controllers\CustomAuthController::class,'Registration']);
Route::post('/login/{data}',            [App\Http\Controllers\CustomAuthController::class,'Login']);
Route::post('/logout',                  [App\Http\Controllers\CustomAuthController::class,'Logout']);

Route::get('/groupmembers/{id}',        [App\Http\Controllers\MainController::class,'GroupMembers']);
Route::get('/groupname/{id}',           [App\Http\Controllers\MainController::class,'GroupName']);

Route::get('/lecturergroupget/{id}',    [App\Http\Controllers\MainController::class,'LecturerGroups']);
Route::get('/studentschedule',          [App\Http\Controllers\MainController::class,'studentschedule']);

Route::get('/studentget/{id}',          [App\Http\Controllers\MainController::class,'studentget']);
Route::get('/usergetmog/{id}',          [App\Http\Controllers\MainController::class,'MOG']);

Route::post('/formSubmit/{data}',          [App\Http\Controllers\MainController::class,'formSubmit']);
