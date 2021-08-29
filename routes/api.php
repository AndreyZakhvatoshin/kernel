<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['admin']
    ],
    function () {
        Route::get('/news', [AdminNewsController::class, 'index']);
        Route::get('/news/{id}', [AdminNewsController::class, 'show']);
        Route::post('/news', [AdminNewsController::class, 'create']);
        Route::patch('/news/{id}', [AdminNewsController::class, 'update']);
    }
);
