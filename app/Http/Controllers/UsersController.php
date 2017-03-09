<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    

    	public function index()
    	{
   //  		$users=User::all();
			// die($users);
			if (Auth::check()) {
            // The user is logged in...
				return back();

            }
    		return view('welcome');
    	}

    	public function show(User $name)
    	{
    		
			
    		return view('welcome');
    	}




}
