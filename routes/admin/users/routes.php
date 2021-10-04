<?php

Route::prefix('users')->group(function(){
    // Rutas de usuarios
    Route::get('/', 'Admin\UserController@list')->name('admin.user.list');
    Route::get('/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::post('/create', 'Admin\UserController@do_create')->name('admin.user.do_create');
    Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::post('/edit', 'Admin\UserController@do_edit')->name('admin.user.do_edit');
    Route::get('/deactivate/{id}', 'Admin\UserController@activate')->name('admin.user.activate');
    Route::get('/activate/{id}', 'Admin\UserController@deactivate')->name('admin.user.deactivate');
});

