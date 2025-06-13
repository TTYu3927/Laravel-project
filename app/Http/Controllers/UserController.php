<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class UserController extends Controller
{   
    public function index()
    {
        $users = DB::table('users')->paginate(6);
        return view('users.index', ['users' => $users]);//can be used with compact
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request){

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/users');
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/users');
    }
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    public function login(Request $request){
        $request->session()->put('user', 
            $request->input('user'));

            return redirect('/');
            //echo session('user);
    }
    public function logout(){
        session()->pull('user');//todelete session
        return redirect('/');
    }

}
