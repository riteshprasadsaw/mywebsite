<?php

namespace App\Http\Controllers;

//use Stripe\{Stripe,Charge,Customer};
use Stripe\Charge;
use Stripe\Customer;
use App\Product;


class PurchasesController extends Controller
{
  		  

  		  public function store()
  		  {

          $product=Product::findorFail(request('product'));

           //dd(request('product'));

  		  	$customer=Customer::create([

  		  			'email'=>request('stripeEmail'),
  		  			'source'=>request('stripeToken')

  		  		]);

  		  	Charge::create([

  		  		'customer'=>$customer->id,
  		  		'amount'=>$product->price,
  		  		'currency'=>'usd'


  		  		]);

  		  	return 'All done';
 
  		  }
}
