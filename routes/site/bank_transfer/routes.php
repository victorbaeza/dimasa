<?php

Route::post('/bank_transfer/payment', 'OrderController@do_bankTransferPayment')->name('bank_transfer.payment');
