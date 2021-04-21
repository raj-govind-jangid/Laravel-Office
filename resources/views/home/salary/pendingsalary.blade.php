@extends('home.base')

@section('title')
<title>Pending Salary Lists</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Pending Salary Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalpendingsalary }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
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
                    @if (isset($pendingsalary) && count($pendingsalary) > 0)
                    @foreach ($pendingsalary as $pendingsalary)
                    <tr>
                    <td>{{ $pendingsalary['employee_first_name'] }}  {{ $pendingsalary['employee_last_name'] }}</td>
                    <td>{{ $pendingsalary['department_name'] }}</td>
                    <td>{{ $pendingsalary['post_name']}}</td>
                    <td>{{ $pendingsalary['paymatrix_level_name']}}</td>
                    <td>{{ $pendingsalary['employee_home_address']}}</td>
                    <td><?php echo date('d-m-Y', strtotime($pendingsalary['employee_joining_date']));?></td>
                    <td>
                        <a href="/createsalary/{{$pendingsalary['employeelist_id']}}" class="btn btn-info">Create</a>
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">No Pending Salary Found</td>
                     </tr>
                    @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
