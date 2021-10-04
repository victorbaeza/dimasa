<?php

Route::get('/stripe/test', function(){ return view('stripe.payment');});
Route::post('ajax/stripe/payment', 'StripeController@createPaymentIntent');
Route::post('/stripe/createOrder', 'StripeController@createOrder');
