<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function logincheck(Request $request){
        $user = User::where(['user_email'=>$request->email])->first();
        if($user && Hash::check($request->password, $user->password)){
            $request->session()->put('user',$user);
            return redirect('/login');
        }
        else{
            session()->put('fail',"Email or Password is incorrect");
            return redirect('/login');
        }
    }

    public function logout(){
        Session::forget('user');
        return redirect('/login');
    }
}
