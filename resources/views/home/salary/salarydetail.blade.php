<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>

<style>
    body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>

</head>
<body>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print" id="removethisdiv">
            <a href="javascript:;" onclick="printthispage()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="printthispage()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i>Print</a>
            </span>
            Company Name, Inc
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
                <address class="m-t-5 m-b-5">
                    <strong class="text-inverse">Name: </strong> {{ $salary['employee_first_name'] }} {{ $salary['employee_last_name'] }}<br>
                    <strong> Department: </strong>{{ $salary['department_name'] }}<br>
                    <strong> Post: </strong>{{ $salary['post_name'] }}<br>
                    <strong> Paymatrix: </strong>{{ $salary['paymatrix_level_name'] }}<br>
                    <strong> Address: </strong>{{ $salary['employee_home_address'] }}
                 </address>
            </div>
            <div class="invoice-to">

            </div>
            <div class="invoice-date">
               <small>Salary ID / Salary Month</small>
               <div class="date text-inverse m-t-5"><?php echo date("F", mktime(0, 0, 0, $salary['month'], 10)); ?>,{{ $salary['year'] }}</div>
               <div class="invoice-detail">
                {{ $salary['salary_id'] }}<br>
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">

            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>Particulars</th>
                        <th class="text-right" width="20%">Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Base Salary:</span>
                        </td>
                        <td class="text-right">{{ $salary['salary_salary_base_salary'] }}/-</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Dearness Allowance:</span>
                        </td>
                        <td class="text-right">{{ $salary['salary_dearness_allowance'] }}/-</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">House Rent Allowance:</span>
                        </td>
                        <td class="text-right">{{ $salary['salary_house_rent_allowance'] }}/-</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Transport Allowance:</span>
                        </td>
                        <td class="text-right">{{ $salary['salary_transport_allowance'] }}/-</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Medical Allowance:</span>
                        </td>
                        <td class="text-right">{{ $salary['salary_medical_allowance'] }}/-</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse"><strong>Salary:</strong></span>
                        </td>
                        <td class="text-right"><strong>{{ $salary['salary_gross_salary'] }}/-</strong></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->

            <!-- begin table-responsive -->
            <div class="table-responsive">
                <table class="table table-invoice">
                   <thead>
                      <tr>
                         <th>Deduction</th>
                         <th class="text-right" width="20%">Amount</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr>
                         <td>
                            <span class="text-inverse">Provident Fund:</span>
                         </td>
                         <td class="text-right">{{ $salary['salary_provident_fund'] }}/-</td>
                      </tr>
                      <tr>
                         <td>
                            <span class="text-inverse">Income Tax:</span>
                         </td>
                         <td class="text-right">{{ $salary['salary_income_tax'] }}/-</td>
                      </tr>
                      <tr>
                         <td>
                            <span class="text-inverse">Insurance:</span>
                         </td>
                         <td class="text-right">{{ $salary['salary_insurance'] }}/-</td>
                      </tr>
                      <tr>
                         <td>
                            <span class="text-inverse">Absent Day Deduction:</span>
                         </td>
                         <td class="text-right">{{ $salary['salary_absent_deduction_amount'] }}/-</td>
                      </tr>
                      <tr>
                        <td>
                           <span class="text-inverse"><strong>Total Deduction:</strong></span>
                        </td>
                        <td class="text-right"><strong>{{ $salary['salary_total_deduction'] }}/-</strong></td>
                     </tr>
                   </tbody>
                </table>
             </div>
             <!-- end table-responsive -->

            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>Gross Salary</small>
                        <span class="text-inverse">{{ $salary['salary_gross_salary'] }}/-</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-minus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>Deduction</small>
                        <span class="text-inverse">{{ $salary['salary_total_deduction'] }}/-</span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
                  <small>Net Salary</small> <span class="f-w-600"> {{ $salary['salary_net_salary'] }}/-</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
      </div>
   </div>
</div>
<br>
</body>
<script>
function removeDummy() {
    var elem = document.getElementById('removethisdiv');
    elem.style.display = "none";

}

function printthispage(){
    removeDummy()
    window.print();
    var elem = document.getElementById('removethisdiv');
    elem.style.display = "block";
}
</script>
</html>
