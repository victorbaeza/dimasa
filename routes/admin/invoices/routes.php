<?php

use App\Http\Controllers\Admin\InvoiceController;

Route::prefix('invoices')->group(function(){
    // Rutas de pedidos
    Route::get('/', 'Admin\InvoiceController@list')->name('admin.invoices.list');
    Route::get('/{id}/edit', 'Admin\InvoiceController@edit')->name('admin.invoices.edit');
    Route::post('/edit', 'Admin\InvoiceController@do_edit')->name('admin.invoices.do_edit');

});
