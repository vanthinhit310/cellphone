<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
use Illuminate\Support\Facades\Route;
use Theme\Bfs\Http\Controllers\BfsController;

Route::group(['namespace' => 'Theme\Bfs\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        Route::get('{any}', [BfsController::class, 'index'])->where('any', '^(?!api).*$');

    });
});

//Theme::routes();

//Route::group(['namespace' => 'Theme\Bfs\Http\Controllers', 'middleware' => ['web', 'core']], function () {
//    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
//
//        Route::get('/', 'BfsController@getIndex')
//            ->name('public.index');
//
//        Route::get('sitemap.xml', 'BfsController@getSiteMap')
//            ->name('public.sitemap');
//
//        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'BfsController@getView')
//            ->name('public.single');
//
//    });
//});
