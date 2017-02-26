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


  		  	try{
            $customer=Customer::create([

              'email'=>request('stripeEmail'),
              'source'=>request('stripeToken'),
              'plan'=>$plan->plan_id

            ]);
          } catch(\Exception $e){
             return response()->json(['status'=>$e->getMessage()], 422);
          }

  		  	

  		  	return 'All done';
 
  		  }
}
