<?php

use Illuminate\Support\Facades\Route;
use Theme\Bfs\Http\Controllers\Apis\SlideController;

Route::group([
    'middleware' => ['api'],
    'prefix' => 'api/v1',
    'namespace' => 'Theme\Bfs\Http\Controllers\Apis'
], function () {
    Route::get('get-slides', [SlideController::class, 'getSlides']);
});
