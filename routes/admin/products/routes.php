<?php

use App\Http\Controllers\Admin\ProductController;

Route::prefix('products')->group(function(){
    Route::get('/', 'Admin\ProductController@list')->name('admin.products.list');
    Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
    Route::post('/create', 'Admin\ProductController@do_create')->name('admin.products.do_create');
    Route::get('/{id}/edit', 'Admin\ProductController@edit')->name('admin.products.edit');
    Route::post('/{id}/edit', 'Admin\ProductController@do_edit')->name('admin.products.do_edit');
    Route::get('/{id}/change_availability', 'Admin\ProductController@changeAvailability')->name('admin.products.change_availability');
    Route::get('/{id}/assign_offers', 'Admin\ProductController@assignOffers')->name('admin.products.assign_offers');
    Route::post('/{id}/assign_offers','Admin\ProductController@do_assignOffers')->name('admin.products.do_assign_offers');
    Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('admin.products.delete');

    // Subproductos - Children
    Route::get('/{id}/edit/subproducts', 'Admin\ProductController@editSubproducts')->name('admin.products.edit.subproducts');
    Route::post('/{id}/edit/subproducts', 'Admin\ProductController@do_editSubproducts')->name('admin.products.edit.subproducts.do_edit');
    Route::get('/{id}/edit/delete_subproduct/{subproduct_id}', 'Admin\ProductController@do_deleteSubproduct')->name('admin.products.edit.subproducts.do_delete');

    // Tarifas - Rates
    Route::get('/{id}/edit/delete_rate/{rate_id}', 'Admin\ProductController@do_deleteProductRate')->name('admin.products.edit.rates.do_delete');

    // Categorías
    Route::prefix('categories')->group(function(){
        Route::get('/', 'Admin\ProductController@listCategories')->name('admin.products.categories.list');
        Route::get('/create', 'Admin\ProductController@createCategory')->name('admin.products.categories.create');
        Route::post('/create', 'Admin\ProductController@do_createCategory')->name('admin.products.categories.do_create');
        Route::get('/{id}/edit', 'Admin\ProductController@editCategory')->name('admin.products.categories.edit');
        Route::post('/{id}/edit', 'Admin\ProductController@do_editCategory')->name('admin.products.categories.do_edit');
        Route::delete('/{id}/delete', [ProductController::class, 'deleteCategory'])->name('admin.products.categories.delete');
    });

    // Ofertas
    Route::prefix('offers')->group(function(){
        Route::get('/', 'Admin\ProductController@listOffers')->name('admin.products.offers.list');
        Route::get('/create', 'Admin\ProductController@createOffer')->name('admin.products.offers.create');
        Route::post('/create', 'Admin\ProductController@do_createOffer')->name('admin.products.offers.do_create');
        Route::get('/{id}/edit', 'Admin\ProductController@editOffer')->name('admin.products.offers.edit');
        Route::post('/{id}/edit', 'Admin\ProductController@do_editOffer')->name('admin.products.offers.do_edit');
        Route::delete('/{id}/delete', [ProductController::class, 'deleteOffer'])->name('admin.products.offers.delete');
    });

    // Marcas
    Route::prefix('brands')->group(function(){
        Route::get('/', 'Admin\ProductController@listBrands')->name('admin.products.brands.list');
        Route::get('/create', 'Admin\ProductController@createBrand')->name('admin.products.brands.create');
        Route::post('/create', 'Admin\ProductController@do_createBrand')->name('admin.products.brands.do_create');
        Route::get('/{id}/edit', 'Admin\ProductController@editBrand')->name('admin.products.brands.edit');
        Route::post('/{id}/edit', 'Admin\ProductController@do_editBrand')->name('admin.products.brands.do_edit');
        Route::delete('/{id}/delete', [ProductController::class, 'deleteBrand'])->name('admin.products.brands.delete');
    });
});
