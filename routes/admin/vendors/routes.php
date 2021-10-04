<?php

// Rutas de Proveedores

Route::prefix('vendors')->group(function(){
    Route::get('/', 'Admin\VendorController@list')->name('admin.vendors.list');
    Route::get('/create', 'Admin\VendorController@create')->name('admin.vendors.create');
    Route::post('/create', 'Admin\VendorController@do_create')->name('admin.vendors.do_create');
    Route::get('/{id}/edit', 'Admin\VendorController@edit')->name('admin.vendors.edit');
    Route::post('/{id}/edit', 'Admin\VendorController@do_edit')->name('admin.vendors.do_edit');
});
