<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;


class WebhooksController extends Controller
{
    


	public function handle()
	{

		

		//die(var_dump(request()->all()));
		$payload=request()->all();

		$method=$this->evenToMethod($payload['type']);
		

		if(method_exists($this, $method))
		{
			$this->$method($payload); 

			return response('webhook received');

		}


		

		
	}


	public function whenChargeSucceeded($payload)
	{
		$this->retrieveUser($payload)
			 ->payments()
			 ->create([

			 	'amount'=>$payload['data']['object']['amount'],
			 	'charge_id'=>$payload['data']['object']['id']

			 	]);
	}



	public function whenCustomerSubscriptionDeleted($payload)
	{



		$this->retrieveUser($payload)->deactivate();
 
	}


	public function evenToMethod($event)
	{

		return 'when'.studly_case(str_replace('.', '_', $event));

		//return 'whenCustomerSubscriptionDeleted';
		
	}

	protected function retrieveUser($payload)
	{
		return User::byStripeId(

			$payload['data']['object']['customer']

			);	
	}


}
