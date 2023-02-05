<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {
    //register
    Route::post('/register', [AuthController::class, 'register']);
    //login
    Route::post('/login', [AuthController::class, 'login']);

    //Auth Check
    Route::get('/auth_alive', [AuthController::class, 'authAlive']);
});


Route::group(['prefix' => '/v1', 'middleware' => 'auth:api'], function () {

    //logout
    Route::post('/logout', [AuthController::class, 'logoutUser']);
});
