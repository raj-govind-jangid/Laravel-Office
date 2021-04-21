@extends('home.base')

@section('title')
<title>Create Department</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Create Department</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-6 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/savedepartment" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Department Name:</label>
                        <input type="text" class="form-control" name="department_name" placeholder="Enter Department Name" required>
                    </div>
                    <button class="btn btn-info">Create Department</button>
                </form>
                </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
