@extends('home.base')

@section('title')
<title>Paymatrix Lists</title>
@endsection

@section('content')

<div class="container py-4">
    <header class="text-center text-white">
      <h1 class="display-4">Paymatrix Lists</h1>
      <h4 class="lead mb-0" style="font-size: 30px;">Total Result : {{ $totalpaymatrix }}</h4>
    </header>
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="card rounded shadow border-0">
          <div class="card-body p-4 bg-white rounded">
            <a href="/createpay" class="btn btn-primary mb-4 mr-auto">Create PayMatrix</a>
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Level Name</th>
                        <th>Base Salary</th>
                        <th>Dearness Allowance</th>
                        <th>House Rent Allowance</th>
                        <th>Transport Allowance</th>
                        <th>Medical Allowance</th>
                        <th>Provident Fund</th>
                        <th>Income Tax</th>
                        <th>Insurance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymatrix as $paymatrix)
                    <tr>
                      <td>{{$paymatrix['paymatrix_level_name']}}</td>
                      <td>{{$paymatrix['paymatrix_base_salary']}}</td>
                      <td>{{$paymatrix['paymatrix_dearness_allowance']}}%</td>
                      <td>{{$paymatrix['paymatrix_house_rent_allowance']}}%</td>
                      <td>{{$paymatrix['paymatrix_transport_allowance']}}</td>
                      <td>{{$paymatrix['paymatrix_medical_allowance']}}</td>
                      <td>{{$paymatrix['paymatrix_provident_fund']}}</td>
                      <td>{{$paymatrix['paymatrix_income_tax']}}</td>
                      <td>{{$paymatrix['paymatrix_insurance']}}</td>
                      <td>
                          <a href="/editpay/{{$paymatrix['paymatrix_id']}}"><img src="{{ asset('icon/edit-regular.svg') }}" width="25px"></a>
                          <a href="/deletepay/{{$paymatrix['paymatrix_id']}}"><img src="{{ asset('icon/trash-alt-regular.svg') }}" width="20px"></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
