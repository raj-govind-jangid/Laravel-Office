@extends('home.base')

@section('title')
<title>Edit Paymatrix</title>
@endsection

@section('content')

<header class="text-center text-white">
    <h1 class="display-4">Edit Paymatrix</h1>
  </header>
  <div class="row py-5">
    <div class="col-lg-12 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-4 bg-white rounded">
          <div>
            <form action="/updatepay" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="paymatrix_id" value="{{ $item['paymatrix_id'] }}" placeholder="Enter Level Name" required>
                    <div class="form-group">
                        <label>Level Name:</label>
                        <input type="text" class="form-control" name="level_name" value="{{ $item['paymatrix_level_name'] }}" placeholder="Enter Level Name" required>
                    </div>
                    <div class="form-group">
                        <label>Base Salary:</label>
                        <input type="number" class="form-control" name="base_salary" value="{{ $item['paymatrix_base_salary'] }}" placeholder="Enter Base Salary" required>
                    </div>
                    <div class="form-group">
                        <label>Dearness Allowance:</label>
                        <input type="number" class="form-control" name="dearness_allowance" value="{{ $item['paymatrix_dearness_allowance'] }}" placeholder="Enter Dearness Allowance" required>
                    </div>
                    <div class="form-group">
                        <label>House Rent Allowance:</label>
                        <input type="number" class="form-control" name="house_rent_allowance" value="{{ $item['paymatrix_house_rent_allowance'] }}" placeholder="Enter House Rent Allowance" required>
                    </div>
                    <div class="form-group">
                        <label>Transport Allowance:</label>
                        <input type="number" class="form-control" name="transport_allowance" value="{{ $item['paymatrix_transport_allowance'] }}" placeholder="Enter Transport Allowance" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Medical Allowance:</label>
                        <input type="number" class="form-control" name="medical_allowance" value="{{ $item['paymatrix_medical_allowance'] }}" placeholder="Enter Medical Allowance" required>
                    </div>
                    <div class="form-group">
                        <label>Provident Fund:</label>
                        <input type="number" class="form-control" name="provident_fund" value="{{ $item['paymatrix_provident_fund'] }}" placeholder="Enter Provident Fund" required>
                    </div>
                    <div class="form-group">
                        <label>Income Tax:</label>
                        <input type="number" class="form-control" name="income_tax" value="{{ $item['paymatrix_income_tax'] }}" placeholder="Enter Income Tax" required>
                    </div><div class="form-group">
                        <label>Insurance:</label>
                        <input type="number" class="form-control" name="insurance" value="{{ $item['paymatrix_insurance'] }}" placeholder="Enter Insurance" required>
                    </div>
                </div>
                </div>
                <button class="btn btn-info">Update Paymatrix</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
