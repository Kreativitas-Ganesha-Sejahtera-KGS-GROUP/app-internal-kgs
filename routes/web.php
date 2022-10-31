<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * General content
 */
Route::get('/',[ContentController::class, 'home']);

/**
 * Admin section
 */

Route::group(['prefix' => env('APP_ADMIN_SECTION'), 'namespace' => 'Admin'], function() {

    // Authentication
    Route::get('/login',        [AuthController::class, 'loginRender']);
    Route::post('/login',       [AuthController::class, 'loginHandle']);

    Route::get('/password/forgot',      [PasswordController::class, 'forgotRender']);
    Route::post('/password/forgot',     [PasswordController::class, 'forgotHandle']);

    Route::get('/password/reset',       [PasswordController::class, 'resetRender']);
    Route::post('/password/reset',      [PasswordController::class, 'resetHandle']);

    Route::group(['middleware' => 'admin'], function() {

        // Home
        Route::get('/', [HomeController::class, 'index']);

        Route::group(['middleware' => 'admin'], function() {

            // User Management
            Route::get('/user',             [UserController::class, 'index']);

            Route::get('/user/create',      [UserController::class, 'createRender']);
            Route::post('/user/create',     [UserController::class, 'createHandle']);

            Route::get('/user/edit',        [UserController::class, 'updateRender']);
            Route::post('/user/edit',       [UserController::class, 'updateHandle']);
            
            Route::get('/user/remove',      [UserController::class, 'removeRender']);
            Route::post('/user/remove',     [UserController::class, 'removeHandle']);

        });

        // Logout
        Route::get('/logout',       [AuthController::class, 'logout']);

    });
});
