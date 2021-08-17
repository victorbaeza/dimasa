<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    private function setCartData(){
        Cart::add(12, 'Product 1', 1, 10.00);
        Cart::add(13, 'Product 3', 3, 20.00);
    }

    public function createPaymentIntent(Request $request){
        Stripe::setApiKey(env('STRIPE_KEY_SECRET'));

        $this->setCartData();
        $amount = Cart::total() * 100; //stripe recibe centimos
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'eur',
                'payment_method_types' => ['card']
            ]);
            return response()->json(['clientSecret' => $paymentIntent->client_secret, 'key' => env('STRIPE_KEY_PUBLISHABLE')]);
        } catch (ApiErrorException $e) {
            return response()->json(['error' => $e], 400);
        }
    }
}
