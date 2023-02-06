<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;


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

    //add customer
    Route::post('/customer', [CustomerController::class, 'addCustomer']);
});


Route::group(['prefix' => '/v1', 'middleware' => 'auth:api'], function () {

    //logout
    Route::post('/logout', [AuthController::class, 'logoutUser']);
});


Route::get('/get/customers', [CustomerController::class, 'getDashboard']);
Route::get('/get/customers/{id}', [CustomerController::class, 'getSingleCustomer']);
Route::put('/update/customer', [CustomerController::class, 'updateCustomer']);
Route::delete('/delete/customer/{id}', [CustomerController::class, 'deleteCustomer']);
