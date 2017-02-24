<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    

    	public function index()
    	{
    		$users=User::all();
			die($users);
    		return view('welcome');
    	}

    	public function show(User $name)
    	{
    		
			die($name);
    		return view('welcome');
    	}




}
