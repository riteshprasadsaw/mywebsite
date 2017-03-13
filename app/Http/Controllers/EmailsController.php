<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Http\Requests;

class EmailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $emails=request();
        die(var_dump($emails));

        // return view('home', compact('plans'));
        
        return back();
    }

   
    }
