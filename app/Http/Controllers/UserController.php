<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Users;
use Hash;
use Redirect;
use \Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Mail;

use Session;



class UserController extends Controller
{

	function index() {
		return view('register');
	}

	function home() {
		$user=["Ani","Anna","Hayk"];
		$person = [
			["name"=>"Anna","age"=>20,"surname"=>"Sahakyan"],
			["name"=>"Ani","age"=>10,"surname"=>"Sargsyan"],
			["name"=>"Nare","age"=>25,"surname"=>"Harutyunyan"],


		];
		return view('home')->with("name","Anna")->with("user",$user)->with("info",$person);
	}

// public function withValidator($validator)
// {
//     $validator->after(function ($validator) {
//         if ($this->somethingElseIsInvalid()) {
//             $validator->errors()->add('field', 'Something is wrong with this field!');
//         }
//     });
// }
	function signup(Request $r) {

		$valid=Validator::make($r->all(), [
			'name'=>'required | max:5',
			'surname'=>'required',
			'age'=>'required | numeric',
			'email'=>'required | email |unique:users',
			'password'=>'required | min:6 | confirmed',


		]);


		if ($valid->fails()) {
			return redirect()->back()
			->withErrors($valid)
			->withInput();
		}
		else {
			$user = new Users();
			$user->name = $r->name;
			$user->surname = $r->surname;
			$user->age = $r->age;
			$user->email = $r->email;
			$user->password = Hash::make($r->password);
			$user->save();


             $data = array(
             	'id'=>$user->id,
             	'name'=>$r->name,
             	'surname'=>$r->surname,
                 'hash'=>md5($user->id.$r->email));

            Mail::send('mail', $data, function($message) use($r) {
         $message->to($r->email, 'Shop admin')->subject
            ('Email verification');
         $message->from('zarahyan97@gmail.com','Shop admin');
      });
            

			return Redirect::to("/login");
		}

	}
	function activateUser($id,$hash) {
		$user = Users::where('id',$id)->first();
		if($user) {
			if($hash = md5($id.$user->email)) {
				$user->active = 1;
				$user->save();
				return Redirect::to('login');
			}
		}
		
	}
	function login(Request $r){
		return view('login');



	}


	function logout (Request $r) {
      Session::forget('user_id');
      return Redirect::to('/login');
	}

	function profile()
	{
		$user = Users::where('id',Session::get('user_id'))->first(); 	
		return view('profile')->with('user',$user);

	}



	function loginuser(Request $r){

		$validateLogin=Validator::make($r->all(), [
			'email'=>'required | email',
			'password'=>'required | min:6'
		]);

		$user=Users::where("email",$r->email)->first();
		$validateLogin->after(function ($validateLogin)
		use ($user,$r)
		 {

			if(!$user){

				$validateLogin->errors()->add('email', 'Wrong email information!');

			}
			elseif(!Hash::check($r->password,$user->password)) {
				$validateLogin->errors()->add('password', 'Wrong password!');
			}
			elseif($user->active == 0) {

				$validateLogin->errors()->add('email', 'Wrong email information!');

			}
			// elseif($r->blocktime >)time() {

			// 	$validateLogin->errors()->add('email', 'Your account blocked!');

			// }

		});

		if ($validateLogin->fails()) {
			return redirect()->back()
			->withErrors($validateLogin)
			->withInput();
		}
		else {
			Session::put('user_id',$user->id);
			if($user['type']=="admin")
			return Redirect::to('/admin');
		}   
		
		


		
	}

	 public function showChangePasswordForm(){
        return view('changePassword');
    }

     public function changePassword(Request $r){
        $user = Users::where('id',Session::get('user_id'))->first(); 	
        if (!(Hash::check($r->input('current-password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($r->get('current-password'), $r->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $r->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Users::where('id',Session::get('user_id'))->first(); 	
        $user->password = bcrypt($r->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
    public function forgetPassword (){
    	return view('forgot');
    }
    public function password(Request $r){
    $user = Users::where('email',$r->email)->first();
    if(count($user) == 0){
    	return redirect()->back()->with(['error' => 'Email not exists']);
    }
    }


}
