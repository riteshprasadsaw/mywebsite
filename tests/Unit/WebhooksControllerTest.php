<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\WebhooksController;

class WebhooksControllerTest extends TestCase
{
	use DatabaseTransactions;
  
    public function testBasicTestnew()
    {
        

        $name=(new WebhooksController)->evenToMethod('customer.subscription.deleted');

        $this->assertEquals('whenCustomerSubscriptionDeleted',$name);
        
    }

    public function testBasicTestnew1()
    {

    	$user=factory('App\User')->create([

    		'stripe_active'=>1,
    		'stripe_id'=>'fake_stripe_id'

    		]);

    	$this->post('stripe/webhook',[

    		'type'=>'customer.subscription.deleted',
    		'data'=>[

    				'object'=>[

    				    'customer'=>$user->stripe_id      
    				    ]

					]

    		]);


    	//dd(!! $user->fresh()->stripe_active);
    	//$this->assertFalse(!!$user->fresh()->stripe_active);

    	$user=$user->fresh();

    	//dd($user->fresh()->isSubscribed());
    	//dd($this->assertFalse(true));

    	$this->assertFalse($user->fresh()->isSubscribed());

    }
}
