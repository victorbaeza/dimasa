<?php

// Rutas AJAX para panel de ADMIN
Route::post('ajax/upload', 'Admin\AjaxController@editorUpload')->name('upload');
Route::get('ajax/products/subcategories', 'Admin\AjaxController@getSubcategories');
Route::post('ajax/admin/seo/sitemaps/editar', 'SEOController@do_editSitemap')->name('admin.seo.do_edit');

Route::post('ajax/products/edit/delete_photo', 'Admin\AjaxController@do_deleteProductPhoto');

Route::get('/ajax/select/users', 'Admin\AjaxController@selectUsers')->name('admin.ajax.select.users');
Route::get('/ajax/select/clients', 'Admin\AjaxController@selectClients')->name('admin.ajax.select.clients');
Route::get('/ajax/select/vendors', 'Admin\AjaxController@selectVendors')->name('admin.ajax.select.vendors');
Route::get('/ajax/select/products', 'Admin\AjaxController@selectProducts')->name('admin.ajax.select.products');
Route::get('/ajax/select/payment_forms', 'Admin\AjaxController@selectPaymentForms')->name('admin.ajax.select.payment_forms');
Route::get('/ajax/select/purchase_payment_forms', 'Admin\AjaxController@selectPurchasePaymentForms')->name('admin.ajax.select.purchase_payment_forms');

Route::post('/ajax/products/get_info', 'Admin\AjaxController@getProductInfo')->name('admin.ajax.products.get_info');
Route::post('/ajax/clients/get_info', 'Admin\AjaxController@getClientInfo')->name('admin.ajax.clients.get_info');
