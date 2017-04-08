<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

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

        public function profile()
        {
            return view('profile', array('user'=>Auth::user()));
        }

        public function update_avatar(Request $request)

        {
            if($request->hasFile('avatar'))
            {
                $avatar=$request->file('avatar');
                $filename=time() . '.' . 'jpg';
                Image::make($avatar)->resize(300, 300)->save(public_path('/images/'. $filename));

                $user=Auth::user();
                $user->avatar=$filename;
                $user->save();
            }

             return view('profile', array('user'=>Auth::user()));
        }

        public function delete_account($userId)
        {
           
             $user = User::find(Auth::user()->id);

             Auth::logout();

             if ($user->delete()) {

                return redirect(route('login'))->with('status','Your account has been deleted successfully. Sorry to see you go!');

             }
        }




}
