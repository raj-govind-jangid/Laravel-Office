<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class SuperAdmin extends Controller
{
    public function admin($page = null){
        $user = user::query();
        $totaldata = $user->get()->count();
        $number_of_result = $user->count();
        if ($page === null){
            $page = 1;
        }
        else{

        }
        $results_per_page = 10;
        $page_first_result = ($page-1) * $results_per_page;
        $number_of_page = ceil ($number_of_result / $results_per_page);
        $data = $user->offset($page_first_result)->limit($results_per_page)->get();
        return view('superadmin.admin',['user'=>$data,'totaluser'=>$totaldata,'number_of_page'=>$number_of_page,'page'=>$page]);
    }

    public function searchuser(Request $request, $page = null){
        $email = $request->email;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $phoneno = $request->phoneno;
        $type = $request->type;
        $user = user::query();

        if(!$email == null){
            $user->where('user_email','Like','%'.$email.'%');
        }
        if(!$firstname == null){
            $user->where('user_first_name','Like','%'.$firstname.'%');
        }
        if(!$lastname == null){
            $user->where('user_last_name','Like','%'.$lastname.'%');
        }
        if(!$phoneno == null){
            $user->where('user_phoneno','Like','%'.$phoneno.'%');
        }
        if($type == "Admin" || $type == "Superadmin"){
            $user->where(['user_type'=>$type]);
        }
        $totaldata = $user->get()->count();
        $number_of_result = $user->count();
        if ($page === null){
            $page = 1;
        }
        else{

        }
        $results_per_page = 10;
        $page_first_result = ($page-1) * $results_per_page;
        $number_of_page = ceil ($number_of_result / $results_per_page);
        $searchuser = $user->offset($page_first_result)->limit($results_per_page)->get();
        return view('superadmin.searchuser',['user'=>$searchuser,
            'totaluser'=>$totaldata,
            'number_of_page'=>$number_of_page,
            'page'=>$page,
            'email'=>$email,
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'phoneno'=>$phoneno,
            'type'=>$type
        ]);
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
