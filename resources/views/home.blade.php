@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


        @if(auth()->user()->isOnGracePeriod())

            <div class="panel panel-default">
                <div class="panel-heading">Grace Period</div>

                <div class="panel-body">
                      
                   <p>
                       Your subscription will fully expire on {{auth()->user()->subscription_end_at->format('y-m-d')}}
                   </p>

                   <form method="POST" action="/subscriptions">
                       {{method_field('PATCH')}}
                       {{csrf_field()}}

                       <div class="checkbox">
                           
                           <label>
                               <input type="checkbox" name="resume">
                               Resume My Subscription

                           </label>
                       </div>

                       <button type="submit" class="btn btn-primary">Update </button>

                   </form>
    
                </div>
            </div>

        @elseif(!auth()->user()->isSubscribed())


        
            <div class="panel panel-default">
                <div class="panel-heading">Create a Subscription</div>

                <div class="panel-body">
                      <checkout-form :plans="{{ $plans }}"></checkout-form>
                   
    


                </div>
            </div>

          @endif

            @if(count(auth()->user()->isSubscribed()))
            <div class="panel panel-default">
                <div class="panel-heading">Payments</div>

                    <div class="panel-body">

                        <ul class="list-group">

                            @foreach(auth()->user()->payments as $payment)
                            <li class="list-group-item"> 
                                {{$payment->created_at->diffForHumans()}}:
                                <strong>${{$payment->inDollars()}}</strong>
                            </li>
                            @endforeach
                        </ul>
                        

                    </div>

                
                </div>

                @endif

                @if(auth()->user()->isSubscribed())

                <div class="panel panel-default">
                <div class="panel-heading">Cancel Subscription</div>

                    <div class="panel-body">

                      <form method="POST" action="/subscriptions">

                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <button class="btn btn-danger">Cancel Subscription </button>
                        
                        </form>

                    </div>

                
                </div>

             @endif



            </div>



            </div>

           

        </div>


        



    </div>
</div>

@endsection
