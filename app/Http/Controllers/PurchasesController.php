<?php

namespace App\Http\Controllers;

//use Stripe\{Stripe,Charge,Customer};
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class PurchasesController extends Controller
{
  		  

  		  public function store()
  		  {

  		  	Stripe::setApiKey(config('services.stripe.secret'));

  		  	$customer=Customer::create([

  		  			'email'=>request('stripeEmail'),
  		  			'source'=>request('stripeToken')

  		  		]);

  		  	Charge::create([

  		  		'customer'=>$customer->id,
  		  		'amount'=>2500,
  		  		'currency'=>'usd'


  		  		]);

  		  	return 'All done';
 
  		  }
}
