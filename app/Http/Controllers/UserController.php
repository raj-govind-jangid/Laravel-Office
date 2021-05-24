<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function logincheck(Request $request){
        $user = User::where(['user_email'=>$request->email])->first();
        if($user && Hash::check($request->password, $user->password)){
            $request->session()->put('user',$user);
            return redirect('/');
        }
        else{
            session()->put('fail',"Email or Password is incorrect");
            return redirect('/login');
        }
    }

    public function logout(){
        $useremail = session()->get('user')['user_email'];
        Cache::pull(".$useremail.");
        Session::forget('user');
        return redirect('/login');
    }

    public function onlineuser(Request $request){
        if(session()->get('user')){
            $useremail = session()->get('user')['user_email'];
            Cache::put(".$useremail.",1,60);
        }
    }

    static function userstatus($useremail){
        if(Cache::get(".$useremail.")){
           return "<span style='color: green;'>Online</span>";
        }
        else{
           return "<span style='color: red;'>Offline</span>";
        }
    }
}
