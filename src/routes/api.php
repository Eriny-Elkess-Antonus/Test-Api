<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;

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



    Route::resource('news','App\Http\Controllers\API\NewsController');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [  AuthController::class, 'login']);
        Route::post('/registration', [  AuthController::class, 'register']);
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });
