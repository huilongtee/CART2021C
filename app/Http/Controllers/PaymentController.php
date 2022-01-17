<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\Models\myOrder;
use App\Models\myCart;
use Notification;

class PaymentController extends Controller
{

    public function __contruct()
    {
        $this->middlewware('auth');
    }
    public function paymentPost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->sub * 100, //stripe will think that this is the sen. e.g input 10 -> 10sen
            "currency" => "MYR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of southern online",
        ]);

        $newOrder = myOrder::Create([
            'paymentStatus' => 'Done',
            'userID' => Auth::id(),
            'amount' => $request->sub,
        ]);

        $orderID = DB::table('my_orders')->where('userID', '=', Auth::id())->orderBy('created_at', 'desc')->first(); //get order ID just now created

        $items = $request->input('cid');
        foreach ($items as $item => $value) {
            $carts = myCart::find($value); //get the cart item record
            $carts->orderID = $orderID->id; //binding the ordeID value with record
            $carts->save();
        }
(new CartController)->cartItem();

        $email = 'huulong0225@gmail.com';//sender email
        Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));



        Session::flash('success', "The payment has been made sucessfully");

        return back();
    }
}
