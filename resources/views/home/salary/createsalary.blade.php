@extends('home.base')

@section('title')
<title>Create Salary</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Create Salary</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/savesalary" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <input type="hidden" class="form-control" name="employeelist_id" value="{{ $item['employeelist_id'] }}" required>
                    <input type="hidden" class="form-control" name="paymatrix_id" value="{{ $item['employee_paymatrix_id'] }}" required>
                    <div class="form-group">
                        <label>Employee Name:</label>
                        <input type="text" class="form-control" name="employee_name" value="{{ $item['employee_first_name'] }} {{ $item['employee_last_name'] }}" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Department:</label>
                        <input type="text" class="form-control" name="employee_department" value="{{ $item['department_name'] }}" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Post:</label>
                        <input type="text" class="form-control" name="employee_post" value="{{ $item['post_name'] }}" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Level:</label>
                        <input type="text" class="form-control" name="employee_level" value="{{ $item['paymatrix_level_name'] }}" disabled required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Month:</label>
                        <select class="form-control" name='month_id'>
                            <option value="<?php echo date('m'); ?>" selected><?php echo date('m'); ?></option>
                            @for ($i = 01; $i < 13; $i++)
                            @if( date('m') == $i)
                            @continue
                            @endif
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year:</label>
                        <select class="form-control" name='year_id'>
                            <option value="<?php echo date('Y'); ?>" selected><?php echo date('Y'); ?></option>
                            @for ($i = 2014; $i < 2030; $i++)
                            @if( date('Y') == $i)
                            @continue
                            @endif
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total Absent Day:</label>
                        <input type="number" class="form-control" name="absent_day" placeholder="Enter Absent Day" min="0" max="30" required>
                    </div>
                    </div>
                    </div>
                    <button class="btn btn-info">Create Salary</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
