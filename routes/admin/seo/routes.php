<?php

Route::prefix('seo')->group(function(){
    // Rutas de SEO
    Route::get('/sitemaps', 'SEOController@listSitemap')->name('admin.seo.list');
    Route::post('/sitemaps/nuevo', 'SEOController@createSitemap')->name('admin.seo.create');
});

