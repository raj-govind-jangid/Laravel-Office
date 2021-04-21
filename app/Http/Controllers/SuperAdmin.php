<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class SuperAdmin extends Controller
{
    public function admin(){
        $user = user::all();
        $totaluser = $user->count();
        return view('superadmin.admin',['user'=>$user,'totaluser'=>$totaluser]);
    }

    public function createuser(){
        return view('superadmin.createuser');
    }

    public function saveuser(Request $request){
        if(user::where(['user_email'=>$request->email])->first()){
            session()->put('fail', 'Email ID Already Exists');
            return redirect('/createuser');
        }
        else{
            $user = new user;
            $user->user_email=$request->email;
            $user->user_first_name=$request->firstname;
            $user->user_last_name=$request->lastname;
            $user->user_phoneno=$request->phoneno;
            $user->password=Hash::make($request->password);
            $user->user_type=$request->type;
            $user->save();
            session()->put('success', 'Created Successfully');
            return redirect('/admin');
        }
    }

    public function edituser($id){
        $user = user::where(['user_id'=>$id])->first();
        return view('superadmin.edituser',['user'=>$user]);
    }

    public function updateuser(Request $request){
        $user = user::where(['user_id'=>$request->user_id]);
        $user->update([
                'user_first_name'=>$request->firstname,
                'user_last_name'=>$request->lastname,
                'user_phoneno'=>$request->phoneno,
                'user_type'=>$request->type,
        ]);
        session()->put('success', 'Updated Successfully');
        return redirect('/admin');
    }

    public function deleteuser($id){
        $user = user::where(['user_id'=>$id])->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/admin');
    }

    public function changepassword($id){
        $user = user::where(['user_id'=>$id])->first();
        return view('superadmin.changepassword',['user'=>$user]);
    }

    public function updatepassword(Request $request){
        $user = user::where(['user_id'=>$request->user_id]);
        $user->update([
            'password'=>Hash::make($request->password),
        ]);
        session()->put('success', 'Updated Successfully');
        return redirect('/admin');
    }
}
