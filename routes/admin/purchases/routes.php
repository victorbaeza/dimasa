<?php

// Rutas de Compras

Route::prefix('purchases')->group(function(){
    Route::get('/', 'Admin\PurchaseController@list')->name('admin.purchases.list');
    Route::get('/create', 'Admin\PurchaseController@create')->name('admin.purchases.create');
    Route::post('/create', 'Admin\PurchaseController@do_create')->name('admin.purchases.do_create');
    Route::get('/{id}/edit', 'Admin\PurchaseController@edit')->name('admin.purchases.edit');
    Route::post('/{id}/edit', 'Admin\PurchaseController@do_edit')->name('admin.purchases.do_edit');

    Route::get('{id}/edit/remove_line/{line_id}', 'Admin\PurchaseController@do_removeLine')->name('admin.purchases.edit.do_remove_line');

    Route::post('delete', 'Admin\PurchaseController@do_delete')->name('admin.purchases.do_delete');
});
