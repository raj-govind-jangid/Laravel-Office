@extends('home.simple')

@section('title')
<title>Salary Details</title>
@endsection

@section('content')
<div class="container mt-3">
    <a href="/downloadsalarypdf/{{$salary['salary_id']}}" class="btn btn-primary">Download PDF</a>
    <hr>
    <div class="mt-2" style="font-size: 17px;">

    <h2 style="text-align: center; background-color: orange;">Salary Slip for the month of <?php echo date("F", mktime(0, 0, 0, $salary['month'], 10)); ?> {{ $salary['year'] }}</h2>
    <div style="background-color: wheat; padding: 30px;">
            <p><strong>Employee Name: </strong>{{ $salary['employee_first_name'] }} {{ $salary['employee_last_name'] }}</p>
            <p><strong>Department: </strong>{{ $salary['department_name'] }}</p>
            <p><strong>Post: </strong>{{ $salary['post_name'] }}</p>
            <p><strong>Paymatrix: </strong>{{ $salary['paymatrix_level_name'] }}</p>
            <p><strong>Home Address: </strong>{{ $salary['employee_home_address'] }}</p>
    </div>

    <div style="background-color: wheat; padding: 30px;">
        <div class="row">
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Particulars</h2>
            <p><strong>Base Salary:</strong></p>
            <p><strong>Dearness Allowance:</strong></p>
            <p><strong>House Rent Allowance:</strong></p>
            <p><strong>Transport Allowance:</strong></p>
            <p><strong>Medical Allowance:</strong></p>
            <hr>
            <p><strong>Gross Salary:</strong></p>
        </div>
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Amount</h2>
            <p>{{ $salary['salary_salary_base_salary'] }}/-</p>
            <p>{{ $salary['salary_dearness_allowance'] }}/-</p>
            <p>{{ $salary['salary_house_rent_allowance'] }}/-</p>
            <p>{{ $salary['salary_transport_allowance'] }}/-</p>
            <p>{{ $salary['salary_medical_allowance'] }}/-</p>
            <hr>
            <p><strong>{{ $salary['salary_gross_salary'] }}/-</strong></p>
        </div>
        </div>

    </div>

    <div style="background-color: wheat; padding: 30px;">
        <div class="row">
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Deduction</h2>
            <p><strong>Provident Fund:</strong></p>
            <p><strong>Income Tax:</strong></p>
            <p><strong>Insurance:</strong></p>
            <p><strong>Absent Day Deduction:</strong></p>
            <hr>
            <p><strong>Total Deduction:</strong></p>
        </div>
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Amount</h2>
            <p>{{ $salary['salary_provident_fund'] }}/-</p>
            <p>{{ $salary['salary_income_tax'] }}/-</p>
            <p>{{ $salary['salary_insurance'] }}/-</p>
            <p>{{ $salary['salary_absent_deduction_amount'] }}/-</p>
            <hr>
            <p><strong>{{ $salary['salary_total_deduction'] }}/-</strong></p>
        </div>
        </div>

    </div>

    <div style="background-color: wheat; padding: 30px;">
        <div class="row">
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Net Salary</h2>
            <p><strong>Net Salary:</strong></p>
        </div>
        <div class="col-md-6">
            <h2 style="text-align: center; background-color: orange;">Amount</h2>
            <p>{{ $salary['salary_gross_salary'] }} - {{ $salary['salary_total_deduction'] }} = <strong> {{ $salary['salary_net_salary'] }}/-</strong></p>
        </div>
        </div>

    </div>

    </div>
</div>
@endsection
