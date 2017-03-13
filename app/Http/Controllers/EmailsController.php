<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class HomeController extends Controller
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
        $emails=request()->all();
        dd($emails);

        // return view('home', compact('plans'));
        
    }

   
    }
