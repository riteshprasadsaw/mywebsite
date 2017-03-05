<?php

namespace App;

use Stripe\Customer;
use Carbon\Carbon;
use Stripe\Subscription as StripeSubscription;

class Subscription
{

	protected $user;



	public function __construct(User $user)
	{
		$this->user=$user;
		
	}



	public function create(Plan $plan, $token)
	{

		$customer=Customer::create([

              'email'=>$this->user->email,
              'source'=>$token,
              'plan'=>$plan->plan_id

            ]);


		$this->user->activate($customer->id);
	}



	public function cancel($atPeriodEnd=true)
	{
		$customer=Customer::retrieve($this->user->stripe_id);

		$subscription=$customer->cancelSubscription(['at_period_end'=>$atPeriodEnd]);

		$endDate=Carbon::createFromTimestamp($subscription->current_period_end);

		$this->user->deactivate($endDate);

	}


	public function cancelImmediatly()
	{
		return $this->cancel(false);
	}
	

	public function retrieveStripeSubscription()
	{

		return StripeSubscription::retrieve($this->user->stripe_subscription);
	}


}