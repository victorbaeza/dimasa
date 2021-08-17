<?php

// Rutas AJAX para panel de ADMIN
Route::post('ajax/upload', 'Admin\AjaxController@editorUpload')->name('upload');
Route::get('ajax/products/subcategories', 'Admin\AjaxController@getSubcategories');
Route::post('ajax/admin/seo/sitemaps/editar', 'SEOController@do_editSitemap')->name('admin.seo.do_edit');

Route::post('ajax/products/edit/delete_photo', 'Admin\AjaxController@do_deleteProductPhoto');
