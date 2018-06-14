<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Auth;
use Validator;
use Gate;

class UserController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

  /*
  * Change Password form
  *
  * Show the change password form for admin users
  */
  public function changePasswordForm() {
    if(Gate::allows('change-password')) {
      return view('auth.passwords.change');
    }
    //$this->session()->put('alert-info', 'You are not authorized to perform that action.');
    return redirect()->route('home')->with('alert-danger', 'You are not authorized to perform that action.');
  }

  /*
  * Change Password function
  *
  * Allow admin users to change their password
  */
  public function changePassword(Request $request){

    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }

    $validatedData = $this->validate($request, [
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
    ]);

    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with("success","Password changed successfully !");

  }

}
