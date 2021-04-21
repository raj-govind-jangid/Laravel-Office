@extends('home.base')

@section('title')
<title>Create Pay</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Create Paymatrix</h1>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <div>
                <form action="/savepay" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Level Name:</label>
                            <input type="text" class="form-control" name="level_name" placeholder="Enter Level Name" required>
                        </div>
                        <div class="form-group">
                            <label>Base Salary:</label>
                            <input type="number" class="form-control" name="base_salary" placeholder="Enter Base Salary" required>
                        </div>
                        <div class="form-group">
                            <label>Dearness Allowance:</label>
                            <input type="number" class="form-control" name="dearness_allowance" placeholder="Enter Dearness Allowance" required>
                        </div>
                        <div class="form-group">
                            <label>House Rent Allowance:</label>
                            <input type="number" class="form-control" name="house_rent_allowance" placeholder="Enter House Rent Allowance" required>
                        </div>
                        <div class="form-group">
                            <label>Transport Allowance:</label>
                            <input type="number" class="form-control" name="transport_allowance" placeholder="Enter Transport Allowance" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Medical Allowance:</label>
                            <input type="number" class="form-control" name="medical_allowance" placeholder="Enter Medical Allowance" required>
                        </div>
                        <div class="form-group">
                            <label>Provident Fund:</label>
                            <input type="number" class="form-control" name="provident_fund" placeholder="Enter Provident Fund" required>
                        </div>
                        <div class="form-group">
                            <label>Income Tax:</label>
                            <input type="number" class="form-control" name="income_tax" placeholder="Enter Income Tax" required>
                        </div><div class="form-group">
                            <label>Insurance:</label>
                            <input type="number" class="form-control" name="insurance" placeholder="Enter Insurance" required>
                        </div>
                    </div>
                    </div>
                    <button class="btn btn-info">Create Pay</button>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
