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

		if($payload['type']=='customer.subscription.deleted')
		{

			$user=User::where('stripe_id',$payload['data']['object']['customer'])->firstOrFail();

			$user->deactivate();

			return response('webhook received');
		}
	}


}
