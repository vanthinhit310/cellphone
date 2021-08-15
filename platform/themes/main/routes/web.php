<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.

use Theme\Main\Http\Controllers\NewsController;
use Theme\Main\Http\Controllers\ProductController;

Route::group(['namespace' => 'Theme\Main\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        //----------------------------------------[Blog Route]----------------------------------------
        Route::get('news', [NewsController::class, 'index'])->name('news.index');
        Route::get('post/{slug}', [NewsController::class, 'getDetail'])->name('news.detail');
        //----------------------------------------[Blog Route]----------------------------------------

        //----------------------------------------[Product Route]----------------------------------------
        Route::get('{category}/{slug}', [ProductController::class, 'getProductDetail'])->name('product.detail');
        //----------------------------------------[Product Route]----------------------------------------
    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\Main\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'MainController@index')
            ->name('public.index');

        Route::get('sitemap.xml', 'MainController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'MainController@getView')
            ->name('public.single');

    });
});
