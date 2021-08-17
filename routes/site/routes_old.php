<?php
// Rutas del front-end

use App\Http\Controllers\ClientAreaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

// Main pages
Route::get('/{blog}', [SiteController::class, 'listBlogs'])->name('blog');
Route::get('/{blog}/{slug}', [SiteController::class, 'showBlog'])->name('blog.show');
Route::get('/{contact}/', function(){ return view('site.contacto'); })->name('contact');
Route::post('contact/submit', [SiteController::class, 'do_submitContact'])->name('do_contact');

// Newsletter
Route::post('/newsletter/subscribe', [SiteController::class, 'do_subscribeNewsletter'])->name('newsletter.do_subscribe');

// Legal
Route::get('/{legal_notice}', function(){ return view('site.legal.aviso-legal'); })->name('legal_notice');
Route::get('/{privacy}/', function(){ return view('site.legal.politica-privacidad'); })->name('privacy');
Route::get('/{cookies}/', function(){ return view('site.legal.politica-cookies'); })->name('cookies');
Route::get('/{about}', function(){ return view('site.about');})->name('about');
Route::get('/{general_terms}/', function(){ return view('site.legal.condiciones_generales');})->name('condiciones_generales');
Route::get('/{envio_y_pago}/', function(){ return view('site.legal.envio_y_pago');})->name('envio_y_pago');
Route::get('/{devoluciones}/', function(){ return view('site.legal.devoluciones');})->name('devoluciones');
Route::get('/{desistimiento}/', function(){ return view('site.legal.desistimiento');})->name('desistimiento');


// Store / Products
Route::get('/{products}/', 'ProductController@showProductList')->name('product_list');
Route::prefix('products')->group(function(){
    Route::get('/{slug}/', [ProductController::class, 'show'])->name('product.show');
});

//Cart
Route::prefix('cart')->group(function(){
    Route::get('/', [OrderController::class, 'getCart'])->name('cart');
    Route::post('/', [OrderController::class, 'addCartProduct'])->name('cart.add');
    Route::post('/apply_coupon', [OrderController::class, 'applyCoupon'])->name('cart.apply_coupon');
    Route::post('/direct_checkout', [OrderController::class, 'addCartDirectCheckout'])->name('cart.direct_checkout');
    Route::post('/{id}/delete', [OrderController::class, 'deleteCartProduct'])->name('cart.delete');
    Route::post('/{id}/quantity', [OrderController::class, 'changeProductQuantity'])->name('cart.quantity');
});

//Order
Route::prefix('order')->group(function (){
    Route::get('/details', [OrderController::class, 'orderDetails'])->name('order.details');
    Route::post('/check', [OrderController::class, 'checkOrder'])->name('order.check');
    Route::get('/payment/{uuid}', [OrderController::class, 'paymentForm'])->name('order.payment');
    Route::post('/do_payment/paypal', [OrderController::class, 'do_paymentPaypal'])->name('order.do_payment.paypal');
    Route::post('/do_payment/redsys', [OrderController::class, 'do_paymentRedsys'])->name('order.do_payment.redsys');
    Route::get('/completed', [OrderController::class, 'orderCompleted'])->name('order.completed');
    Route::get('/error', function() { return view('site.order.order-error'); })->name('order.error');
});
