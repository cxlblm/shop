<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/sign-up', [Controllers\UserController::class, 'store']);
Route::post('/sign-in', Controllers\SignInController::class);
Route::middleware(['auth:api'])->group(function () {
    Route::post('/me', Controllers\SignInController::class);
});
