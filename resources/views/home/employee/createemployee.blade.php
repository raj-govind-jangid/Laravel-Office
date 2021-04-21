@extends('home.base')

@section('title')
<title>Create Employee</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Create Employee</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/saveemployee" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>First Name:</label>
                      <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name='gender'>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phoneno" placeholder="Enter Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label>Joining Date</label>
                        <input type="text" class="form-control" name="joining_date" placeholder="Enter Joining Date" id="datepicker" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control" name='department_id'>
                                @foreach ($department as $department)
                                <option value="{{$department['department_id']}}">{{$department['department_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Home Address:</label>
                            <input type="text" class="form-control" name="home_address" placeholder="Enter Home Address" required>
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <select class="form-control" name='post_id'>
                                @foreach ($post as $post)
                                <option value="{{$post['post_id']}}">{{$post['post_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Paymatrix</label>
                            <select class="form-control" name='paymatrix_id'>
                                @foreach ($paymatrix as $paymatrix)
                                <option value="{{$paymatrix['paymatrix_id']}}">{{$paymatrix['paymatrix_level_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name='status'>
                                <option value="Pending">Pending</option>
                                <option value="Working">Working</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Create Employee</button>
                  </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
