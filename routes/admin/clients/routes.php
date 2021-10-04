<?php
Route::prefix('clients')->group(function(){
    // rutas de Clientes
    Route::get('/', 'Admin\ClientController@list')->name('admin.client.list');
    Route::get('/create', 'Admin\ClientController@create')->name('admin.client.create');
    Route::post('/create', 'Admin\ClientController@do_create')->name('admin.client.do_create');
    Route::get('/{id}/edit', 'Admin\ClientController@edit')->name('admin.client.edit');
    Route::post('/edit', 'Admin\ClientController@do_edit')->name('admin.client.do_edit');
    Route::get('/{id}/deactivate', 'Admin\ClientController@activate')->name('admin.client.activate');
    Route::get('/{id}/activate', 'Admin\ClientController@deactivate')->name('admin.client.deactivate');
    Route::get('/{id}/professional_validate', 'Admin\ClientController@validateProfessionalClient')->name('admin.client.validate');
});
