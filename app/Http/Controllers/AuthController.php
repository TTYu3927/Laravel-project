<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;



class AuthController extends Controller
{
    public function register()
    {
        return view('Auth.RegisterForm');
    }
    public function login()
    {
        return view('Auth.LoginForm');
    }
    public function createUser(Request $request){
        $record = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        Session::push('user',[
            'name' => $user->name,
            'email' => $user->email
        ]);

        return redirect()->route('Auth.login');
    }

    public function checkAuth(Request $request){
        $record = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]); 
        $credentials = $request->only('email', 'password'); //wanttofilteruseonlymethod

        // if(Auth::attempt($credentials)){
        //     return redirect()->intended('/adminpage')->with('success', 'Login successful');
        // }else{
        //     return redirect()->back()->with('error', 'Invalid credentials');
            
        // }
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
    
            if ($user->usertype === 'admin') {
                return redirect()->intended('/adminpage')->with('success', 
                'Welcome, Admin!');
            } else {
                return redirect()->intended('/')->with('success', 
                'Welcome, User!');
            }
        }
    
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('Auth.login')->with('success', 'Logged out successfully');
    }
}//    if (Auth::attempt($credentials)) {
    // $user = Auth::user(); 
    
    // if ($user->usertype === 'admin') {
    //     return redirect()->intended('/adminpage')->with('success', 
    //'successfully logged in as admin');
    // } elseif ($user->usertype === 'user') {
    //     return redirect()->intended('/')->with('success',
    // 'successfully logged in as user');
    // }else {
    // Auth::logout();
    // return redirect()->route('Auth.login')->with('error', 'Unauthorized access');
    // }

