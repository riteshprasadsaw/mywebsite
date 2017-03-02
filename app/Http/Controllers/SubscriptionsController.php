<?php
namespace App\Http\Controllers;
//use Stripe\{Stripe,Charge,Customer};

use App\Http\Requests\RegistrationForm;
use Exception;


class SubscriptionsController extends Controller
{
        
        public function store(RegistrationForm $form)
        {




          try{

          $form->save();

          } catch(Exception $e)
          {
             return response()->json([
                'status'=>$e->getMessage()], 422);
          }

          
          return [
           'status'=>'Success!'
          ];





 
        }
}