<?php

use Illuminate\Support\Facades\Route;
use Theme\Bfs\Http\Controllers\Apis\ContactController;
use Theme\Bfs\Http\Controllers\Apis\NewsletterController;
use Theme\Bfs\Http\Controllers\Apis\ProductCategoryController;
use Theme\Bfs\Http\Controllers\Apis\ProductController;
use Theme\Bfs\Http\Controllers\Apis\SlideController;

Route::group([
    'middleware' => ['api'],
    'prefix' => 'api/v1',
    'namespace' => 'Theme\Bfs\Http\Controllers\Apis'
], function () {
    Route::get('get-slides', [SlideController::class, 'getSlides']);
    Route::get('product-categories', [ProductCategoryController::class, 'getCategories']);
    Route::get('feature-products', [ProductController::class, 'getFeatureProducts']);
    Route::get('selling-products', [ProductController::class, 'getSellingProducts']);
    Route::get('products', [ProductController::class, 'getAllProducts']);

    Route::prefix('newsletter')->group(function () {
        Route::post('subscribe', [NewsletterController::class, 'subscribe']);
    });

    Route::prefix('contact')->group(function () {
        Route::post('send', [ContactController::class, 'sendContact']);
    });
});
