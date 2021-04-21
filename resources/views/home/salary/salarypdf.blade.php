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

    <title>Salary PDF</title>

</head>
<body>

    <div class="container mt-3">
        <hr>
        <div class="mt-2" style="font-size: 13px;">
        <h2 style="text-align: center; background-color: orange;">Salary Slip for the month of <?php echo date("F", mktime(0, 0, 0, $salary['month'], 10)); ?> {{ $salary['year'] }}</h2>
        <div style="background-color: wheat; padding: 30px;">
                <p><strong>Employee Name: </strong>{{ $salary['employee_first_name'] }} {{ $salary['employee_last_name'] }}</p>
                <p><strong>Department: </strong>{{ $salary['department_name'] }}</p>
                <p><strong>Post: </strong>{{ $salary['post_name'] }}</p>
                <p><strong>Paymatrix: </strong>{{ $salary['paymatrix_level_name'] }}</p>
                <p><strong>Home Address: </strong>{{ $salary['employee_home_address'] }}</p>
        <table style="border-style: none;">
            <thead class="text-center">
                <tr>
                <th colspan="4">Particulars</th>
                <th colspan="4">Deduction</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Base Salary:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_salary_base_salary'] }}/-</td>
                    <td colspan="2"></td>
                    <td><strong>Provident Fund:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_provident_fund'] }}/-</td>
                </tr>
                <tr>
                    <td><strong>Dearness Allowance:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_dearness_allowance'] }}/-</td>
                    <td colspan="2"></td>
                    <td><strong>Income Tax:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_income_tax'] }}/-</td>
                </tr>
                <tr>
                    <td><strong>House Rent Allowance:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_house_rent_allowance'] }}/-</td>
                    <td colspan="2"></td>
                    <td><strong>Insurance:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_insurance'] }}/-</td>
                </tr>
                <tr>
                    <td><strong>Transport Allowance:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_transport_allowance'] }}/-</td>
                    <td colspan="2"></td>
                    <td><strong>Absent Day Deduction:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_absent_deduction_amount'] }}/-</td>
                </tr>
                <tr>
                    <td><strong>Medical Allowance:</strong></td>
                    <td colspan="1"></td>
                    <td>{{ $salary['salary_medical_allowance'] }}/-</td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td><strong>Total Gross Salary:</strong></td>
                    <td colspan="1"></td>
                    <td><strong>{{ $salary['salary_gross_salary'] }}/-</strong></td>
                    <td colspan="2"></td>
                    <td><strong>Total Deduction:</strong></td>
                    <td colspan="1"></td>
                    <td><strong>{{ $salary['salary_total_deduction'] }}/-</strong></td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr style="background-color: orange;">
                    <td><strong>Total Net Salary = </strong></td>
                    <td colspan="7">{{ $salary['salary_gross_salary'] }} - {{ $salary['salary_total_deduction'] }} = <strong> {{ $salary['salary_net_salary'] }}/-</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

