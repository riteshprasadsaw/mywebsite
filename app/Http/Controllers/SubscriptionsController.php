<?php

namespace App\Http\Controllers;

//use Stripe\{Stripe,Charge,Customer};
use Stripe\Charge;
use Stripe\Customer;
use App\Plan;


class SubscriptionsController extends Controller
{
  		  

  		  public function store()
  		  {

          $plan=Plan::findorFail(request('plan'));

           //dd(request('product'));

  		  	$customer=Customer::create([

  		  			'email'=>request('stripeEmail'),
  		  			'source'=>request('stripeToken'),
              'plan'=>$plan->plan_id

  		  		]);

  		  	

  		  	return 'All done';
 
  		  }
}
