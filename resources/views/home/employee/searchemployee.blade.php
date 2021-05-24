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
            <a href="/createemployee" class="btn mb-4 mr-auto">Create Employee</a>
            <a href class="btn mb-4 mr-auto" data-toggle="modal" data-target="#myModal">Search Filter</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped text-center">
                <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                  <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Post</th>
                    <th scope="col">Pay Matrix</th>
                    <th scope="col">Home Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($employee as $employee)
                    <tr>
                    <td>{{$employee['employeelist_id']}}</td>
                    <td>{{$employee['employee_first_name']}}  {{$employee['employee_last_name']}}</td>
                    <td>{{$employee['department_name']}}</td>
                    <td>{{$employee['post_name']}}</td>
                    <td>{{$employee['paymatrix_level_name']}}</td>
                    <td>{{$employee['employee_home_address']}}</td>
                    <td>{{$employee['employee_phoneno']}}</td>
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
            <div class="table-responsive">
                <ul class="pagination">
                    @if($page >= 2)
                    <li class="page-item"><a class="page-link" href="/searchemployee/{{ $page-1 }}?employeeid={{$employeeid}}&email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&perpage={{$perpage}}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $number_of_page; $i++)
                    @if($page == $i)
                    <li class="page-item active"><a class="page-link" href="/searchemployee/{{ $i }}?employeeid={{$employeeid}}&email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&perpage={{$perpage}}">{{$i}}</a></li>
                    @continue
                    @endif
                    <li class="page-item"><a class="page-link" href="/searchemployee/{{ $i }}?employeeid={{$employeeid}}&email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&perpage={{$perpage}}">{{$i}}</a></li>
                    @endfor
                    @if($page < $number_of_page)
                    <li class="page-item"><a class="page-link" href="/searchemployee/{{ $page+1 }}?employeeid={{$employeeid}}&email={{$email}}&firstname={{$firstname}}&lastname={{$lastname}}&phoneno={{$phoneno}}&perpage={{$perpage}}">Next</a></li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="/searchemployee" method="GET">
                <div class="form-group">
                  <label>Employee ID:</label>
                  <input type="text" class="form-control" name="employeeid" value="{{ $employeeid }}">
                </div>
                <div class="form-group">
                  <label>Email ID:</label>
                  <input type="text" class="form-control" name="email" value="{{ $email }}">
                </div>
                <div class="form-group">
                  <label>First Name:</label>
                  <input type="text" class="form-control" name="firstname" value="{{ $firstname }}">
                </div>
                <div class="form-group">
                  <label>Last Name:</label>
                  <input type="text" class="form-control" name="lastname" value="{{ $lastname }}">
                </div>
                <div class="form-group">
                  <label>Phone No:</label>
                  <input type="text" class="form-control" name="phoneno" value="{{ $phoneno }}">
                </div>
                <div class="form-group">
                  <label>Result Per Page:</label>
                  <select class="form-control" name="perpage" value={{ $perpage }}>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                  </select>
                </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn">Apply Search</button>
          </form>
          <button type="button" class="btn" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

@endsection
