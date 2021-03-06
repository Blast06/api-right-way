<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\V1\Auth\LoginAuth;
use App\Http\Controllers\V1\Auth\LogoutAuth;
use App\Http\Controllers\V1\Auth\MeAuth;
use App\Http\Controllers\V1\Auth\RefreshAuth;
use App\Http\Controllers\V1\Categories\ListCategories;
use App\Http\Controllers\V1\Categories\GetCategory;
use App\Http\Controllers\V1\Categories\DeleteCategory;
use App\Http\Controllers\V1\Categories\CreateCategory;
use App\Http\Controllers\V1\Categories\UpdateCategory;

Route::prefix('categories')->middleware('auth:api')->group(function () {
    Route::get('/', ListCategories::class);
    Route::get('{id}', GetCategory::class);
    Route::delete('{id}', DeleteCategory::class);
    Route::post('/', CreateCategory::class);
    Route::put('/', UpdateCategory::class);
});

Route::prefix('auth')->group(function () {
    Route::post('login', LoginAuth::class);
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', LogoutAuth::class);
        Route::post('refresh', RefreshAuth::class);
        Route::get('me', MeAuth::class);
    });
});
