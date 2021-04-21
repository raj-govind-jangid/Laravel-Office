@extends('home.base')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="container pt-4 text-light">
 <div class="row">
     <div class="col-md-3">
        <div class="card bg-danger">
          <div class="card-body text-center">
            <h4 class="card-title">Total Employees</h4>
            <p class="card-text" style="font-size: 30px">{{ $employeecount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-info">
          <div class="card-body text-center">
            <h4 class="card-title">Pending Employees</h4>
            <p class="card-text" style="font-size: 30px">{{ $pendingcount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-success">
          <div class="card-body text-center">
            <h4 class="card-title">Total Posts</h4>
            <p class="card-text" style="font-size: 30px">{{ $postcount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-warning">
          <div class="card-body text-center">
            <h4 class="card-title">Total Department </h4>
            <p class="card-text" style="font-size: 30px">{{ $departmentcount }}</p>
          </div>
        </div>
      </div>
     </div>
</div>
@endsection
