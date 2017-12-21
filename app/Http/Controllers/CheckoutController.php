<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CartController;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;


class CheckoutController extends Controller
{
    
    public function shipping()
    {

        $countries_package = app('pragmarx.countries');
        $countries = $countries_package->all()->pluck('name.common');

        return view('front.shipping-info', compact('countries'));
    }

    public function payment()
    {
 
        return view('front.payment');
    }

    public function storePayment(Request $request)
    {

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("sk_test_H6BlXkIncn2EkiKDP9PdwujL");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token =  $request->stripeToken;

        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => Cart::instance('shopping')->total() * 100, // Amount in cents
                "currency" => "usd",
                "source" => $token,
                "description" => "Example charge"
            ));
        } catch (\Stripe\Error\Card $e) {
            return 'The card has been declined';
        }

        //Create the order - send the mail to the user then  destroy the cart
            Order::createOrder(); //creates the order and sends the message
            Cart::destroy();

        //redirect user to some page

            return redirect()->route('home')
                            ->with('success', 'Your Order has been Completed, Please Check your email.');
    }

  
}
