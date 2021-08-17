<?php

Route::prefix('admin')->group(function(){
    // Home
    Route::get('/home', 'Admin\AdminController@getHomeAdmin')->name('admin.home');
    Route::post('/home/slider/nuevo', 'Admin\AdminController@do_createNewSlider');
    Route::get('/home/slider/activar/{id}', 'Admin\AdminController@activateSlider');
    Route::get('/home/slider/desactivar/{id}', 'Admin\AdminController@deactivateSlider');
    Route::get('/home/slider/borrar/{id}', 'Admin\AdminController@deleteSlider');

    Route::get('dashboards', 'Admin\AdminController@getDashboards')->name('admin.dashboards');

// Rutas de pedidos de clientes
    require base_path('routes/admin/orders/routes.php');

// Rutas de facturas
    require base_path('routes/admin/invoices/routes.php');

// Rutas de usuarios
    require base_path('routes/admin/users/routes.php');

// Rutas de clientes
    require base_path('routes/admin/clients/routes.php');

// Rutas de Blogs
    require base_path('routes/admin/blogs/routes.php');

//Rutas de Productos
    require base_path('routes/admin/products/routes.php');

// Rutas de Contactos
    require base_path('routes/admin/contacts/routes.php');
    // Route::get('admin/contacts', 'Admin\AdminController@listContacts')->name('admin.contacts.list');

// Rutas de compras y proveedores
    require base_path('routes/admin/vendors/routes.php');
    require base_path('routes/admin/purchases/routes.php');

// Rutas de SEO
    require base_path('routes/admin/seo/routes.php');
});
