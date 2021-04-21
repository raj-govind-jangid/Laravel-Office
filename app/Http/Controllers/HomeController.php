<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employeelist;
use App\Models\paymatrix;
use App\Models\post;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $employeecount =  employeelist::all()->where('employee_status','Working')->count();
        $pendingcount = employeelist::all()->where('employee_status','Pending')->count();
        $postcount = post::all()->count();
        $departmentcount = department::all()->count();
        return view('home.home',['employeecount'=>$employeecount,'pendingcount'=>$pendingcount,'postcount'=>$postcount,'departmentcount'=>$departmentcount]);
    }

    // Employee Function

    public function employee(){
        $employee = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->where('employee_status','Working')
            ->get();
        $totalemployee = $employee->count();
        return view('home.employee.employee',['employee'=>$employee,'totalemployee'=>$totalemployee]);
    }

    public function pendingemployee(){
        $pendingemployee = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->where('employee_status','Pending')
            ->get();
        $totalpendingemployee = $pendingemployee->count();
        return view('home.employee.pendingemployee',['pendingemployee'=>$pendingemployee,'totalpendingemployee'=>$totalpendingemployee]);
    }

    public function pendingaccept($id){
        $employee = employeelist::where(['employeelist_id'=>$id]);
        $employee->update(['employee_status'=>'Working']);
        session()->put('success', 'Added Successfully');
        return redirect('/pendingemployee');
    }

    public function pendingreject($id){
        employeelist::where(['employeelist_id'=> $id])->delete();
        session()->put('success', 'Removed Successfully');
        return redirect('/pendingemployee');
    }

    public function viewemployee($id){
        $employee = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->where('employeelist_id',$id)
            ->first();
        return view('home.employee.viewemployee',['employee'=>$employee]);
    }

    public function createemployee(){
        $post = post::all();
        $department = department::all();
        $paymatrix = paymatrix::all();
        return view('home.employee.createemployee',['post'=>$post,'department'=>$department,'paymatrix'=>$paymatrix]);
    }

    public function saveemployee(Request $request){
        $employee = new employeelist;
        $employee->employee_first_name = $request->first_name;
        $employee->employee_last_name = $request->last_name;
        $employee->employee_email = $request->email;
        $employee->employee_gender = $request->gender;
        $employee->employee_phoneno = $request->phoneno;
        $employee->employee_department_id = $request->department_id;
        $employee->employee_home_address = $request->home_address;
        $employee->employee_post_id = $request->post_id;
        $employee->employee_paymatrix_id = $request->paymatrix_id;
        $employee->employee_joining_date = date("Y-m-d", strtotime($request->joining_date));
        $employee->employee_status = $request->status;
        $employee->save();
        session()->put('success', 'Created Successfully');
        return redirect('/employee');
    }

    public function editemployee($id){
        $employeelist = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
              ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
              ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
              ->where('employeelist_id',$id)
              ->first();
        $post = post::all();
        $department = department::all();
        $paymatrix = paymatrix::all();
        return view('home.employee.editemployee',['employeelist'=>$employeelist,'post'=>$post,'department'=>$department,'paymatrix'=>$paymatrix]);
    }

    public function updateemployee(Request $request){
        $employeelist = employeelist::where(['employeelist_id'=>$request->id]);
        $employeelist->update([
            'employee_first_name' => $request->first_name,
            'employee_last_name' => $request->last_name,
            'employee_email' => $request->email,
            'employee_gender' => $request->gender,
            'employee_phoneno' => $request->phoneno,
            'employee_department_id' => $request->department_id,
            'employee_home_address' => $request->home_address,
            'employee_post_id' => $request->post_id,
            'employee_joining_date' => date("Y-m-d", strtotime($request->joining_date)),
            'employee_status' => $request->status,
        ]);
        session()->put('success', 'Updated Successfully');
        return redirect('/employee');
    }

    public function deleteemployee($id){
        employeelist::where('employeelist_id', $id)->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/employee');
    }

    // Post Function

    public function post(){
        $post = post::all();
        $totalpost = $post->count();
        return view('home.post.post',['post'=>$post,'totalpost'=>$totalpost]);
    }

    public function createpost(){
        return view('home.post.createpost');
    }

    public function savepost(Request $request){
        $post = new post;
        $post->post_name=$request->post_name;
        $post->save();
        session()->put('success', 'Added Successfully');
        return redirect('/post');
    }

    public function editpost($id){
        $item = post::where(['post_id'=>$id])->first();
        return view('home.post.editpost',['item'=>$item]);
    }

    public function updatepost(Request $request){
        $post = post::where(['post_id'=>$request->post_id]);
        $post->update(['post_name'=>$request->post_name]);
        session()->put('success', 'Updated Successfully');
        return redirect('/post');
    }

    public function deletepost($id){
        post::where('post_id', $id)->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/post');
    }

    // Department Function

    public function department(){
        $department = department::all();
        $totaldepartment = $department->count();
        return view('home.department.department',['department'=>$department,'totaldepartment'=>$totaldepartment]);
    }

    public function createdepartment(){
        return view('home.department.createdepartment');
    }

    public function savedepartment(Request $request){
        $department = new department;
        $department->department_name=$request->department_name;
        $department->save();
        session()->put('success', 'Created Successfully');
        return redirect('/department');
    }

    public function editdepartment($id){
        $item = department::where(['department_id'=>$id])->first();
        return view('home.department.editdepartment',['item'=>$item]);
    }

    public function updatedepartment(Request $request){
        $department = department::where(['department_id'=>$request->department_id]);
        $department->update(['department_name'=>$request->department_name]);
        session()->put('success', 'Updated Successfully');
        return redirect('/department');
    }

    public function deletedepartment($id){
        department::where('department_id', $id)->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/department');
    }

}
