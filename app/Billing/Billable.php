<?php

namespace App\Billing;
use Carbon\Carbon;
use App\Subscription;
use App\Billing\Payment;

trait Billable
{


	 public static function byStripeId($stripeId)
    {
        return static::where('stripe_id',$stripeId)->firstOrFail();
    }


    public function activate($customerId=null, $subscriptionId=null){


         return $this->forceFill([

                'stripe_id'=>$customerId ?? $this->stripe_id,

                'stripe_active'=>true,

                'stripe_subscription'=>$subscriptionId ?? $this->stripe_subscription,

                'subscription_end_at'=>null

            ])->save();

    }

    public function deactivate($endDate=null){

        $endDate=$endDate ?:Carbon::now();


         return $this->forceFill([

               
                'stripe_active'=>false,
                'subscription_end_at'=>$endDate

            ])->save();

    }


    public function subsciption()
    {

        return new Subscription($this);

    }


    public function isSubscribed()
    {

        return !! $this->stripe_active;
    }

     public function isActive()
    {

        return $this->isSubscribed() ||  $this->isOnGracePeriod();
    }

    public function isOnGracePeriod()
    {
        if(! $endsAt=$this->subscription_end_at)
        {
            return false;
        }

        return Carbon::now()->lt(Carbon::instance($endsAt));
    }



    public function payments()
    {

        return $this->hasMany(Payment::class);
    }
}