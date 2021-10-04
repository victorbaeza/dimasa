<?php

// Rutas de Contactos

Route::prefix('contacts')->group(function () {
    Route::get('/', 'Admin\AdminController@listContacts')->name('admin.contacts.list');
    Route::get('/newsletter', 'Admin\AdminController@listNewsletterSubscriptors')->name('admin.contacts.newsletter.list');
    // Route::get('/', 'ContactsController@list')->name('admin.contacts.list');
    // Route::get('/newsletter', 'ContactsController@listNewsletterSubscriptors')->name('admin.contacts.newsletter.list');
});
