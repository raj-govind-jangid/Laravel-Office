@extends('home.base')

@section('title')
<title>Employee Lists</title>
@endsection

@section('content')
<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Employee Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalemployee }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <a href="/createemployee" class="btn btn-primary mb-4 mr-auto">Create Employee</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Post</th>
                    <th scope="col">Pay Matrix</th>
                    <th scope="col">Home Address</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($employee as $employee)
                    <tr>
                    <td>{{$employee['employee_first_name']}}  {{$employee['employee_last_name']}}</td>
                    <td>{{$employee['department_name']}}</td>
                    <td>{{$employee['post_name']}}</td>
                    <td>{{$employee['paymatrix_level_name']}}</td>
                    <td>{{$employee['employee_home_address']}}</td>
                    <td><?php echo date('d-m-Y', strtotime($employee['employee_joining_date']));?></td>
                    <td>
                        <a href="/editemployee/{{$employee['employeelist_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deleteemployee/{{$employee['employeelist_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
