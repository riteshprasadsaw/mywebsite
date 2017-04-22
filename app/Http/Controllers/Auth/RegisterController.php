<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\WelcomeAgain;
use Guzzlehttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
      

    }

    protected function register(Request $request)
    {
        $input=$request->all();
        $validator=$this->validator($input);
        
        $gtoken=$request->input('g-recaptcha-response');

        
        $client = new \GuzzleHttp\Client();
        $response=$client->post('https://www.google.com/recaptcha/api/siteverify',[
            'form_params'=>array(
                'secret'=>'6Lc2KB0UAAAAAMM_iYO-BMiJ8p2cSrhk2Jg2nccQ',
                'response'=>$gtoken
                )

            ]);

        $result=json_decode($response->getBody()->getContents());

        // dd($result);


        if($validator->passes() and $result->success )
        {
            $data=$this->create($input)->toArray();
            $data['token']=str_random(25);

            $user=User::find($data['id']);
            $user->token=$data['token'];
            $user->save();

            Mail::send('emails.confirmation', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration onfirmation');
            });
            //Mail::to($user)->send(new WelcomeAgain($user));
            return redirect(route('login'))->with('status','Confirmation email has been sent! Please check your email box.');


        }

        return redirect(route('register'))->with('status', $validator->errors());
    }

    public function confirmation($token)
    {
        $user=User::where('token',$token)->first();
        if(!is_null( $user))
        {
            $user->confirmed=1;
            $user->token='';
            $user->save();
            return redirect(route('login'))->with('status','Your activation is completed. Please login to continue.');
        }
        return redirect(route('login'))->with('status','Whoops!,Something went wrong');
    }

}
