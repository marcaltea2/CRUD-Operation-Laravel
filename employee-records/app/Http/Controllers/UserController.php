<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    // this function used to direct the user to login page
    public function login(){
        if(View::exists('user.login')){
            return view('user.login');
        }else{
            return abort(404);
        }
    }

    // this function used to validate and authenticate the user credentials
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required',
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/'); // if the email and password are validated, it will redirect to the dashboard
        }

        return back()->withErrors(['email' => 'Incorrect Password or Email.'])->onlyInput('email');
    }

    // this function used to direct user to registration page
    public function register(){
        return view('user.register');
    }
    
    // this function used to logout and regenerate token for safety
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // this function used to validate and store the newly registered user
    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        return redirect('/');
    }   
}
