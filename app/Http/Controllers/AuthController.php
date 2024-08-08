<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // if(!empty(Auth::check()))
        // {
        //     return redirect('admin/admin/subject');           
        // }
        return view('auth.login');


    }

    public function Authlogin(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('admin/admin/subject');
            
        }else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function forgotpassword()
    {
        return view('auth.forgot_password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function register()
    {
        return view('auth.signin');
    }

    public function insert_register(Request $request)
    {
        
        // dd($request->all());
        $user = new User();
        $request->validate([
            'email' => 'required|email|unique:users',
            'mobile'=> 'max:15|min:8'
        ]);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->password = Hash::make($request->password);
        // $user->usertype = 1;
        $user->save();
        return redirect('')->with('success', "Add admin successfully");
    }

    
}
