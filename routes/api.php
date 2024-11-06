<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\AuthController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('packages', PackagesController::class);

Route::get('/', function() {
    return 'Hello World';
});

Route::post('/sign-up', [AuthController::class, 'signUp']);

Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');

Route::delete('/delete-account', [AuthController::class, 'deleteAccount'])->middleware('auth:sanctum');