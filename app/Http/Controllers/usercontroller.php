<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
class usercontroller extends Controller
{
    //Show register create form

    public function create() {
return view('users.register');
    }


    //create new user 
    public function store(Request $request) {
$formfield = $request->validate([
'name' => ['required', 'min:3'],
'email' => ['required', 'email'],
'password' => ['required/confirmed/min:6']
]);

//hash password
$formfield['password'] = bcrypt($formfield['password']);

    }

    //logout user
   public function logout(Request $request) {
    auth()->logout();

    $request->session()->invalidate();
    
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'you have been logged out');

}

//show loggin form 
public function login() {
    return view('users.login');

   } 

   //Authenticate login user 
public function authenticate(Request $request) {

    $formfield = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
        ]);

   if(auth()->attempt($formfield)) {
    $request->session()->regenerate();


   }    return redirect('/')->with('message', 'you are now logged in!');
}
}
