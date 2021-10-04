<?php

use App\Http\Controllers\Admin\OrderController;

Route::prefix('orders')->group(function(){
    // Rutas de pedidos
    Route::get('/', 'Admin\OrderController@list')->name('admin.orders.list');
    Route::get('/{id}/edit', 'Admin\OrderController@edit')->name('admin.orders.edit');
    Route::post('/edit', 'Admin\OrderController@do_edit')->name('admin.orders.do_edit');
    Route::delete('/{id}/delete', [OrderController::class,'delete'])->name('admin.orders.delete');

    // Gestión de pedidos -> Estados
    Route::get('/{id}/confirm_payment', 'Admin\OrderController@do_confirmPayment')->name('admin.orders.confirm_payment');
    Route::get('/{id}/confirm_shipment', 'Admin\OrderController@do_confirmShipment')->name('admin.orders.confirm_shipment');

    //Rutas metodos de envio
    Route::prefix('shipment')->group(function(){
        Route::get('/', 'Admin\OrderController@listShipments')->name('admin.shipment.list');
        Route::get('/create', 'Admin\OrderController@createShipment')->name('admin.shipment.create');
        Route::post('/create', 'Admin\OrderController@do_createShipment')->name('admin.shipment.do_create');
        Route::get('/{id}/edit', 'Admin\OrderController@editShipment')->name('admin.shipment.edit');
        Route::post('/{id}/edit', 'Admin\OrderController@do_editShipment')->name('admin.shipment.do_edit');
        Route::delete('/{id}/delete', [OrderController::class,'deleteShipment'])->name('admin.shipment.delete');
    });

    Route::prefix('coupons')->group(function(){
        Route::get('/', 'Admin\OrderController@listCoupons')->name('admin.coupons.list');
        Route::get('/create', 'Admin\OrderController@createCoupon')->name('admin.coupons.create');
        Route::post('/create', 'Admin\OrderController@do_createCoupon')->name('admin.coupons.do_create');
        Route::get('/{id}/edit', 'Admin\OrderController@editCoupon')->name('admin.coupons.edit');
        Route::post('/{id}/edit', 'Admin\OrderController@do_editCoupon')->name('admin.coupons.do_edit');
        Route::delete('/{id}/delete', [OrderController::class, 'deleteCoupon'])->name('admin.coupons.delete');
    });
});
