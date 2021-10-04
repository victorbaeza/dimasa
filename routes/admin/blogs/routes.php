<?php

use App\Http\Controllers\Admin\BlogController;

Route::prefix('blogs')->group(function(){
    // Rutas de Blogs
    Route::get('/', 'Admin\BlogController@list')->name('admin.blog.list');
    Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
    Route::post('/create', 'Admin\BlogController@do_create')->name('admin.blog.do_create');
    Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
    Route::post('/edit', 'Admin\BlogController@do_edit')->name('admin.blog.do_edit');
    Route::delete('/{id}/delete', [BlogController::class, 'delete'])->name('admin.blog.delete');


// Categorias de Blogs
    Route::prefix('categories')->group(function(){
        Route::get('/', 'Admin\BlogController@listBlogCategories')->name('admin.blog.category.list');
        Route::get('/create', 'Admin\BlogController@createBlogCategory')->name('admin.blog.category.create');
        Route::post('/create', 'Admin\BlogController@do_createBlogCategory')->name('admin.blog.category.do_create');
        Route::get('/{id}/edit', 'Admin\BlogController@editBlogCategory')->name('admin.blog.category.edit');
        Route::post('/edit', 'Admin\BlogController@do_editBlogCategory')->name('admin.blog.category.do_edit');
        Route::delete('/{id}/delete', [BlogController::class, 'deleteBlogCategory'])->name('admin.blog.category.delete');
    });
});

