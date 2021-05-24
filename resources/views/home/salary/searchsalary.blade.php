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
            <a href class="btn mb-4 mr-auto" data-toggle="modal" data-target="#searchfilter">Search Filter</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped text-center">
                <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                    <tr>
                        <th scope="col">Salary ID</th>
                        <th scope="col">Employee ID</th>
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
                    <td>{{ $salary['salary_id']}}</td>
                    <td>{{ $salary['employeelist_id']}}</td>
                    <td>{{ $salary['employee_first_name'] }}  {{ $salary['employee_last_name'] }}</td>
                    <td>{{ $salary['paymatrix_level_name']}}</td>
                    <td>{{ $salary['salary_salary_base_salary']}}</td>
                    <td><?php echo date("F", mktime(0, 0, 0, $salary['month'], 10)); ?></td>
                    <td>{{ $salary['year']}}</td>
                    <td>{{ $salary['salary_net_salary']}}</td>
                    <td>
                        <a href="/salarydetail/{{$salary['salary_id']}}"><img src="{{ asset('icon/eye-regular.svg') }}" width="30px"></a>
                        <a href="/editsalary/{{$salary['salary_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deletesalary/{{$salary['salary_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9">No Result Found</td>
                     </tr>
                    @endif
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
                <ul class="pagination">
                    @if($page >= 2)
                    <li class="page-item"><a class="page-link" href="/searchsalary/{{ $page-1 }}?employeeid={{$employeeid}}&salaryid={{$salaryid}}&departmentid={{$departmentid}}&postid={{$postid}}&paymatrixid={{$paymatrixid}}&monthid={{$monthid}}&yearid={{$yearid}}&perpage={{$perpage}}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $number_of_page; $i++)
                    @if($page == $i)
                    <li class="page-item active"><a class="page-link" href="/searchsalary/{{ $page }}?employeeid={{$employeeid}}&salaryid={{$salaryid}}&departmentid={{$departmentid}}&postid={{$postid}}&paymatrixid={{$paymatrixid}}&monthid={{$monthid}}&yearid={{$yearid}}&perpage={{$perpage}}">{{ $i }}</a></li>
                    @continue
                    @endif
                    <li class="page-item"><a class="page-link" href="/searchsalary/{{ $i }}?employeeid={{$employeeid}}&salaryid={{$salaryid}}&departmentid={{$departmentid}}&postid={{$postid}}&paymatrixid={{$paymatrixid}}&monthid={{$monthid}}&yearid={{$yearid}}&perpage={{$perpage}}">{{ $i }}</a></li>
                    @endfor
                    @if($page < $number_of_page)
                    <li class="page-item"><a class="page-link" href="/searchsalary/{{ $page+1 }}?employeeid={{$employeeid}}&salaryid={{$salaryid}}&departmentid={{$departmentid}}&postid={{$postid}}&paymatrixid={{$paymatrixid}}&monthid={{$monthid}}&yearid={{$yearid}}&perpage={{$perpage}}">Next</a></li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  <!-- The Modal -->
  <div class="modal" id="searchfilter">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Search Salary</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="/searchsalary" method="GET">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Employee ID:</label>
                        <input type="number" class="form-control" name="employeeid" value="{{ $employeeid }}">
                    </div>
                    <div class="form-group">
                        <label>Salary ID:</label>
                        <input type="number" class="form-control" name="salaryid" value="{{ $salaryid }}">
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <select class="form-control" name="departmentid" value="{{ $departmentid }}">
                            <option value="0" selected>All</option>
                            @foreach($department as $d)
                            <option value="{{ $d['department_id'] }}">{{ $d['department_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Post:</label>
                        <select class="form-control" name="postid" value="{{ $postid }}">
                            <option value="0" selected>All</option>
                        @foreach ($post as $p)
                            <option value="{{ $p['post_id'] }}">{{ $p['post_name'] }}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Level:</label>
                        <select class="form-control" name="paymatrixid" value="{{ $paymatrixid }}">
                            <option value="0" selected>All</option>
                        @foreach ($paymatrix as $p)
                            <option value="{{ $p['paymatrix_id'] }}">{{ $p['paymatrix_level_name'] }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Month:</label>
                        <select class="form-control" name='monthid'>
                            <option value="0" selected>All</option>
                            @for ($i = 1; $i < 13; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year:</label>
                        <select class="form-control" name='yearid' value={{ $yearid }}>
                            <option value="0">All</option>
                            @for ($i = 2014; $i < 2030; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
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
