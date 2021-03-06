<?php

use Illuminate\Support\Facades\Route;
use Theme\Bfs\Http\Controllers\Apis\ContactController;
use Theme\Bfs\Http\Controllers\Apis\NewsletterController;
use Theme\Bfs\Http\Controllers\Apis\ProductCategoryController;
use Theme\Bfs\Http\Controllers\Apis\ProductController;
use Theme\Bfs\Http\Controllers\Apis\SettingController;
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

    Route::prefix('product-categories')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'getCategories']);
        Route::get('{slug}', [ProductCategoryController::class, 'getProductCategory']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'getAllProducts']);
        Route::get('relateds', [ProductController::class, 'getRelatedProducts']);
        Route::get('search', [ProductController::class, 'searchProducts']);
        Route::get('variation/{id}', [ProductController::class, 'getProductVariation']);
        Route::get('{slug}', [ProductController::class, 'getProductDetail']);
    });

    Route::prefix('newsletter')->group(function () {
        Route::post('subscribe', [NewsletterController::class, 'subscribe']);
    });

    Route::prefix('contact')->group(function () {
        Route::post('send', [ContactController::class, 'sendContact']);
    });

    Route::prefix('settings')->group(function () {
        Route::get('get', [SettingController::class, 'getSettings']);
    });
});
