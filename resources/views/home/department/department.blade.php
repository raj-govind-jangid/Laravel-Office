@extends('home.base')

@section('title')
<title>Department Lists</title>
@endsection

@section('content')
<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Department Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totaldepartment }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <a href="/createdepartment" class="btn mb-4 mr-auto">Create Department</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped text-center">
                <thead style="background-color: rgb(106, 90, 205); color: #fff;">
                  <tr>
                    <th scope="col">Department Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($department as $department)
                    <tr>
                    <td>{{$department['department_name']}}</td>
                    <td>
                        <a href="/editdepartment/{{$department['department_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                        <a href="/deletedepartment/{{$department['department_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
                <ul class="pagination">
                    @if($page >= 2)
                    <li class="page-item"><a class="page-link" href="/department/{{ $page-1 }}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $number_of_page; $i++)
                    @if($page == $i)
                    <li class="page-item active"><a class="page-link" href="/department/{{ $i }}">{{$i}}</a></li>
                    @continue
                    @endif
                    <li class="page-item"><a class="page-link" href="/department/{{ $i }}">{{$i}}</a></li>
                    @endfor
                    @if($page < $number_of_page)
                    <li class="page-item"><a class="page-link" href="/department/{{ $page+1 }}">Next</a></li>
                    @endif
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
