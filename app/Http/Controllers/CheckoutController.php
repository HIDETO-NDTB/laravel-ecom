<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;
use Mail;
use App\Mail\PurchaseSuccessful;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function payment(Request $request){

        Stripe::setApiKey('sk_test_Jk2DpwmgBtScWztwTx7sHWuM00AR1tT2FG');

        $token = request()->stripeToken;

        $charge = Charge::create([
          "amount" => Cart::total() * 100,
          "currency" => "inr",
          "description" => 'laravel stripe payment',
          "source" => $token,
          ],);

          Session::flash('success','Payment done Successfully');

          Cart::destroy();

          Mail::to($request->stripeEmail)->send(new PurchaseSuccessful);

          return redirect('/');

    }
}
