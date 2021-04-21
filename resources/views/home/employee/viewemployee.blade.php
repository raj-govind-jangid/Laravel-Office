@extends('home.base')

@section('title')
<title>Employee Details</title>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center mt-3 mb-4 ">Employee Details</h1>
    <hr>
    <div class="row mt-4" style="font-size: 20px;">
        <div class="col-md-6">
            <p><strong>First Name</strong>: {{ $employee['employee_first_name'] }}</p>
            <p><strong>Last Name</strong>: {{ $employee['employee_last_name'] }}</p>
            <p><strong>Email</strong>: {{ $employee['employee_email'] }}</p>
            <p><strong>Gender</strong>: {{ $employee['employee_gender'] }}</p>
            <p><strong>Phone Number</strong>: {{ $employee['employee_phoneno'] }}</p>
            <p><strong>Department Name</strong>: {{ $employee['department_name'] }}</p>
            <p><strong>Post Name</strong>: {{ $employee['post_name'] }}</p>
            <p><strong>Home Address</strong>: {{ $employee['employee_home_address'] }}</p>
            <p><strong>Joining Date</strong>: <?php echo date('d-m-Y', strtotime($employee['employee_joining_date']));?></p>
            <p><strong>Employee Status</strong>: {{ $employee['employee_status'] }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Level Name</strong>: {{ $employee['level_name'] }}</p>
            <p><strong>Base Salary</strong>: {{ $employee['base_salary'] }}/-</p>
            <p><strong>Dearness Allowance</strong>: {{ $employee['dearness_allowance'] }}%</p>
            <p><strong>House Rent Allowance</strong>: {{ $employee['house_rent_allowance'] }}%</p>
            <p><strong>Transport Allowance</strong>: {{ $employee['transport_allowance'] }}/-</p>
            <p><strong>Medical Allowance</strong>: {{ $employee['medical_allowance'] }}/-</p>
            <p><strong>Provident Fund</strong>: {{ $employee['provident_fund'] }}/-</p>
            <p><strong>Income Tax</strong>: {{ $employee['income_tax'] }}/-</p>
            <p><strong>Insurance</strong>: {{ $employee['insurance'] }}/-</p>
        </div>
    </div>
    </div>
@endsection
