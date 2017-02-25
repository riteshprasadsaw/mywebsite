<?php

namespace App\Http\Controllers;

//use Stripe\{Stripe,Charge,Customer};
use Stripe\Charge;
use Stripe\Customer;

class PurchasesController extends Controller
{
  		  

  		  public function store()
  		  {



  		  	$customer=Customer::create([

  		  			'email'=>request('stripeEmail'),
  		  			'source'=>request('stripeToken')

  		  		]);

  		  	Charge::create([

  		  		'customer'=>$customer->id,
  		  		'amount'=>5000,
  		  		'currency'=>'usd'


  		  		]);

  		  	return 'All done';
 
  		  }
}
