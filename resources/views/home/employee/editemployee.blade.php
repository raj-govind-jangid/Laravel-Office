@extends('home.base')

@section('title')
<title>Edit Employee</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Edit Employee</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/updateemployee" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="id" value={{$employeelist['employeelist_id']}} required>
                    <div class="form-group">
                      <label>First Name:</label>
                      <input type="text" class="form-control" name="first_name" value={{$employeelist['employee_first_name']}} required>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value={{$employeelist['employee_last_name']}} required>
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" name="email" value={{ $employeelist['employee_email'] }} required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name='gender'>
                            <option value="{{ $employeelist['employee_gender'] }}" selected>{{ $employeelist['employee_gender'] }}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phoneno" value={{ $employeelist['employee_phoneno'] }} required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name='status'>
                            @if( $employeelist['employee_status'] == "Pending" )
                            <option value="Pending" selected>Pending</option>
                            <option value="Working">Working</option>
                            @elseif( $employeelist['employee_status'] == "Working" )
                            <option value="Pending">Pending</option>
                            <option value="Working" selected>Working</option>
                            @endif
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control" name='department_id'>
                                <option value="{{$employeelist['employee_department_id']}}" selected>{{$employeelist['department_name']}}</option>
                                @foreach ($department as $department)
                                @if($department['department_id'] == $employeelist['employee_department_id'])
                                @continue
                                @endif
                                <option value="{{$department['department_id']}}">{{$department['department_name']}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label>Home Address:</label>
                            <input type="text" class="form-control" name="home_address" value={{ $employeelist['employee_home_address'] }} required>
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <select class="form-control" name='post_id'>
                                <option value="{{$employeelist['employee_post_id']}}" selected>{{$employeelist['post_name']}}</option>
                                @foreach ($post as $post)
                                @if($post['post_id'] == $employeelist['employee_post_id'])
                                @continue
                                @endif
                                <option value="{{$post['post_id']}}">{{$post['post_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Paymatrix</label>
                            <select class="form-control" name='paymatrix_id'>
                                <option value="{{$employeelist['employee_paymatrix_id']}}" selected>{{$employeelist['paymatrix_level_name']}}</option>
                                @foreach ($paymatrix as $paymatrix)
                                @if($paymatrix['paymatrix_id'] == $employeelist['employee_paymatrix_id'])
                                @continue
                                @endif
                                <option value="{{$paymatrix['paymatrix_id']}}">{{$paymatrix['paymatrix_level_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Joining Date</label>
                            <input type="text" class="form-control" name="joining_date" value=<?php echo date('d-m-Y', strtotime($employeelist['employee_joining_date']));?> id="datepicker" required>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Update Employee</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
