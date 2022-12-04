<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\BookCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Exception;

class AccountController extends Controller
{
    	### Sign In
	/* After submitting the sign-in form */
	public function postSignIn(Request $request) {
		$validator = $request->validate([
				'username' 	=> 'required',
				'password'	=> 'required'

		]);
		if(!$validator) {
			// Redirect to the sign in page
			return Redirect::route('account-sign-in')
				->withErrors($validator)
				->withInput();   // redirect the input

		} else {

			$remember = ($request->has('remember')) ? true : false;
			$auth = Auth::attempt(array(
				'username' => $request->get('username'),
				'password' => $request->get('password')
			), $remember);
		}

		if($auth) {
			if($request->get('username')==="@wedad12"){
			return Redirect::intended('home');
			}else{
				$categoreies=BookCategories::all();
				return view('panel.allcategoreiesu',compact('categoreies'));
			}
		} else {

			return Redirect::route('account-sign-in')
				->with('global', 'Wrong Email or Wrong Password.');
		}

		return Redirect::route('account-sign-in')
			->with('global', 'There is a problem. Have you activated your account?');
	}

	/* Submitting the Create User form (POST) */
	public function postCreate(Request $request) {
		// dd($request->all());
		$validator = $request->validate([
			    'name'		=> 'required|string',
				'username'		=> 'required|max:20|min:3|unique:users',
				'email'         =>  'required|email|unique:users',
				'password'		=> 'required',
				'password_again'=> 'required|same:password'
		]);

		if(!$validator) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs what were correct

		} else {
			// create an account
			$username	= $request->get('username');
			$password 	= $request->get('password');
			$email	    = $request->get('email');
			$name 	    = $request->get('name');

			$userdata = User::create([
				'username' 	=> $username,
				'name' 	    => $name,
				'email' 	=> $email,
				'password' 	=> Hash::make($password)	
			]);

			if($userdata) {


				return Redirect::route('account-sign-in')
					->with('global', 'Your account has been created. We have sent you an email to activate your account');
			}
		}
	}

	public function getSignIn() {
		return view('account.signin');
	}

	/* Viewing the form (GET) */
	public function getCreate() {
		return view('account.create');
	}

	### Sign Out
	public function getSignOut() {
		Auth::logout();
		return Redirect::route('account-sign-in');
	}

}
