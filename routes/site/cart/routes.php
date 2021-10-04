<?php

use App\Http\Controllers\OrderController;

// Rutas del carrito de compra
Route::prefix('cart')->group(function(){

    Route::get('/', [OrderController::class, 'getCart'])->name('cart');
    Route::post('/', [OrderController::class, 'addCartProduct'])->name('cart.add');
    Route::post('/apply_coupon', [OrderController::class, 'applyCoupon'])->name('cart.apply_coupon');
    Route::post('/direct_checkout', [OrderController::class, 'addCartDirectCheckout'])->name('cart.direct_checkout');
    Route::post('/{id}/delete', [OrderController::class, 'deleteCartProduct'])->name('cart.delete');
    Route::post('/{id}/quantity', [OrderController::class, 'changeProductQuantity'])->name('cart.quantity');

});

// Rutas del proceso de pedido
Route::prefix('order')->group(function (){

    Route::get('/details', [OrderController::class, 'orderDetails'])->name('order.details');
    Route::post('/check', [OrderController::class, 'checkOrder'])->name('order.check');
    Route::get('/payment/{uuid}', [OrderController::class, 'paymentForm'])->name('order.payment');
    Route::post('/do_payment/paypal', [OrderController::class, 'do_paymentPaypal'])->name('order.do_payment.paypal');
    Route::post('/do_payment/redsys', [OrderController::class, 'do_paymentRedsys'])->name('order.do_payment.redsys');
    Route::get('/completed', [OrderController::class, 'orderCompleted'])->name('order.completed');
    Route::get('/error', function() { return view('site.order.order-error'); })->name('order.error');

});
