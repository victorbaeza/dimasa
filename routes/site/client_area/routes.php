<?php
// Rutas del Area de clientes -> Clientes autenticados

use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\ClientAreaController;

Route::prefix('intranet')->group(function(){
    Route::name('client.')->group(function(){
        Route::get('user-area', 'ClientAreaController@getHomeClient')->name('home');
        // Route::get('mis-datos', 'ClientAreaController@editData')->name('client.data.edit');
        Route::post('update-data', 'ClientAreaController@do_editData')->name('data.do_edit');
        Route::get('orders', [ClientAreaController::class, 'listOrders'])->name('orders.list');
        Route::get('address', 'ClientAreaController@getAddress')->name('address');
        Route::post('address/update', 'ClientAreaController@do_editAddress')->name('address.do_edit');
        Route::get('logout', [ClientLoginController::class, 'logout'])->name('logout');
    });
});
