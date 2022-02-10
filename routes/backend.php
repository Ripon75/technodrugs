<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function() {

    Route::middleware(['auth:sanctum'])->group(function() {

        Route:: resource('users',               UserController::class);
        Route:: resource('generics',            GenericController::class);
        Route:: resource('brands',              BrandController::class);
        Route:: resource('products/categories', ProductCategoryController::class);
        Route:: resource('products',            ProductController::class);
        Route:: resource('dosage-forms',        DosageFormController::class);
        Route:: resource('news',                NewsController::class);
    });
});
