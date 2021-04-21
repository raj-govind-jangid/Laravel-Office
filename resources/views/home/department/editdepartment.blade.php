@extends('home.base')

@section('title')
<title>Edit Department</title>
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
                <form action="/updatedepartment" method="POST">
                    @csrf
                    <input type="hidden" name="department_id" value="{{ $item['department_id'] }}">
                    <div class="form-group">
                        <label>Department Name:</label>
                        <input type="text" class="form-control" name="department_name" value="{{ $item['department_name'] }}" required>
                    </div>
                    <button class="btn btn-info">Update Department</button>
                </form>
                </div>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="container">
    <h1 class="text-center mb-4">Edit Department</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">

        </div>
    </div>
</div>

@endsection
