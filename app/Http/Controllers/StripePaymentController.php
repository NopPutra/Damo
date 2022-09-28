<?php

namespace App\Http\Controllers;

use Session;
use Stripe;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {

        return view('pages.stripes.stripe');
    }

    // public function stripePost(Request $request)
    // {

    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             "amount" => 70 * 100,  
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Test payment via Stripe From onlinewebtutorblog.com" 
    //     ]);
  
    //     Session::flash('success', 'Payment done successfully!');
          
    //     return back();
    // }

    // public function store(Request $request){

    //     $request->validate([
    //         'name' => 'required',
    //     ]);
    //     dd($request->name);
    // }

    public function detail(Request $request){

        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'cvc' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        return view('pages.stripes.detail');
    }
}
