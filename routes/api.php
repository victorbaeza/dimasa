<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Pedidos
Route::post('get_o/17092a8a891e6e9542dae73f0b47e8d5', 'ApiController@getPendingOrders');
Route::post('up_o/16259962113f63a92777008f569ae4a0', 'ApiController@updateOrderCodes');

// Clientes
Route::post('get_c/670d1160e2ee71855e285159b0835870', 'ApiController@getPendingClients');
Route::post('up_c/4909ae613b469818afbea8d3f35a70bf', 'ApiController@updateClientCodes');
