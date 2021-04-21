@extends('home.base')

@section('title')
<title>Salary Lists</title>
@endsection

@section('content')


<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Salary Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalsalary }}</h4>
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
                        <th scope="col">Pay Matrix</th>
                        <th scope="col">Base Salary</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">Net Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($salary) && count($salary) > 0)
                    @foreach ($salary as $salary)
                    <tr>
                    <td>{{ $salary['employee_first_name'] }}  {{ $salary['employee_last_name'] }}</td>
                    <td>{{ $salary['paymatrix_level_name']}}</td>
                    <td>{{ $salary['salary_salary_base_salary']}}</td>
                    <td><?php echo date("F", mktime(0, 0, 0, $salary['month'], 10)); ?></td>
                    <td>{{ $salary['year']}}</td>
                    <td>{{ $salary['salary_net_salary']}}</td>
                    <td>
                        <a href="/viewsalary/{{$salary['salary_id']}}"><img src="{{ asset('icon/eye-regular.svg') }}" width="30px"></a>
                        <a href="/editsalary/{{$salary['salary_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deletesalary/{{$salary['salary_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">No Salary Found</td>
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
