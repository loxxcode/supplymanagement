<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "your_name" => "required",
            "username"=> "required|unique:admin",
            "email" => "required|unique:admin",
            "password"=> "required",
        ]);
        $user = new Admin();
        $user->your_name = $request->your_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/')->with('success', 'You have registered successfully');
    }
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin  = Admin::where('username', '=', $request->username)->first();
        if($admin){
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('loginId', $admin->id);
                return redirect('/suppliers')->with('success', 'Hi '. $admin->username .' welcome to our Application');
            }
            else {
                return back()->with('error','password is Incorrect');
            }
        }
        else {
            return back()->with('error','user is not Exist');
        }
    }
    public function logout(){
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect('/');
        }
    }
}
