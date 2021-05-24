@extends('home.base')

@section('title')
<title>Pending Employee</title>
@endsection

@section('content')
<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Pending Employee Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalpendingemployee }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <a href="/createemployee" class="btn mb-4 mr-auto">Create Employee</a>
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
                @if (isset($pendingemployee) && count($pendingemployee) > 0)
                @foreach ($pendingemployee as $pendingemployee)
                    <tr>
                    <td>{{ $pendingemployee['employeelist_id'] }}</td>
                    <td>{{$pendingemployee['employee_first_name']}}  {{$pendingemployee['employee_last_name']}}</td>
                    <td>{{$pendingemployee['department_name']}}</td>
                    <td>{{$pendingemployee['post_name']}}</td>
                    <td>{{$pendingemployee['paymatrix_level_name']}}</td>
                    <td>{{$pendingemployee['employee_home_address']}}</td>
                    <td>{{$pendingemployee['employee_phoneno']}}</td>
                    <td><?php echo date('d-m-Y', strtotime($pendingemployee['employee_joining_date']));?></td>
                    <td>
                        <a href="/pendingaccept/{{ $pendingemployee['employeelist_id'] }}"><img src="https://img.icons8.com/metro/344/checkmark.png" width="25px"></a>
                        <a href="/pendingreject/{{ $pendingemployee['employeelist_id'] }}"><img src="https://img.icons8.com/metro/344/multiply.png" width="25px"></a>
                        <a href="/editemployee/{{$pendingemployee['employeelist_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deleteemployee/{{$pendingemployee['employeelist_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                    </td>
                    </tr>
                @endforeach
                @else
                <tr>
                <td colspan="7">No Pending Employee Found</td>
                </tr>
                @endif
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
                <ul class="pagination">
                    @if($page >= 2)
                    <li class="page-item"><a class="page-link" href="/pendingemployee/{{ $page-1 }}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $number_of_page; $i++)
                    @if($page == $i)
                    <li class="page-item active"><a class="page-link" href="/pendingemployee/{{ $i }}">{{$i}}</a></li>
                    @continue
                    @endif
                    <li class="page-item"><a class="page-link" href="/pendingemployee/{{ $i }}">{{$i}}</a></li>
                    @endfor
                    @if($page < $number_of_page)
                    <li class="page-item"><a class="page-link" href="/pendingemployee/{{ $page+1 }}">Next</a></li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
