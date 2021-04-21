<?php

namespace App\Http\Controllers;

use App\Models\employeelist;
use App\Models\paymatrix;
use App\Models\salary;
use Illuminate\Http\Request;
use PDF;

class SalaryPayController extends Controller
{

    // Paymatrix Function

    public function pay(){
        $paymatrix = paymatrix::all();
        $totalpaymatrix = $paymatrix->count();
        return view('home.pay.pay',['paymatrix'=>$paymatrix,'totalpaymatrix'=>$totalpaymatrix]);
    }

    public function createpay(){
        return view('home.pay.createpay');
    }

    public function savepay(Request $request){
        $paymatrix = new paymatrix();
        $paymatrix->paymatrix_level_name = $request->level_name;
        $paymatrix->paymatrix_base_salary = $request->base_salary;
        $paymatrix->paymatrix_dearness_allowance = $request->dearness_allowance;
        $paymatrix->paymatrix_house_rent_allowance = $request->house_rent_allowance;
        $paymatrix->paymatrix_transport_allowance = $request->transport_allowance;
        $paymatrix->paymatrix_medical_allowance = $request->medical_allowance;
        $paymatrix->paymatrix_provident_fund = $request->provident_fund;
        $paymatrix->paymatrix_income_tax = $request->income_tax;
        $paymatrix->paymatrix_insurance = $request->insurance;
        $paymatrix->save();
        session()->put('success', 'Created Successfully');
        return redirect('/pay');
    }

    public function editpay($id){
        $item = paymatrix::where(['paymatrix_id'=>$id])->first();
        return view('home.pay.editpay',['item'=>$item]);
    }

    public function updatepay(Request $request){
        $paymatrix = paymatrix::where(['paymatrix_id'=>$request->paymatrix_id]);
        $paymatrix->update([
        'paymatrix_level_name' => $request->level_name,
        'paymatrix_base_salary' => $request->base_salary,
        'paymatrix_dearness_allowance' => $request->dearness_allowance,
        'paymatrix_house_rent_allowance' => $request->house_rent_allowance,
        'paymatrix_transport_allowance' => $request->transport_allowance,
        'paymatrix_medical_allowance' => $request->medical_allowance,
        'paymatrix_provident_fund' => $request->provident_fund,
        'paymatrix_income_tax' => $request->income_tax,
        'paymatrix_insurance' => $request->insurance,
        ]);
        session()->put('success', 'Updated Successfully');
        return redirect('/pay');
    }

    public function deletepay($id){
        paymatrix::where('paymatrix_id', $id)->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/pay');
    }

    // Salary Function

    public function salary(){
        $month = date('m');
        $year = date('Y');
        $salary = salary::join('paymatrixs','paymatrixs.paymatrix_id','=','salarys.salary_paymatrix_id')
        ->join('employeelists','employeelists.employeelist_id','=','salarys.salary_employeelist_id')
        ->where(['month'=>$month,'year'=>$year])
        ->get();
        $totalsalary = $salary->count();
        return view('home.salary.salary',['salary'=>$salary,'totalsalary'=>$totalsalary]);
    }

    public function pendingsalary(){
        $month = date('m');
        $year = date('Y');
        $salary = salary::where(['month'=>$month,'year'=>$year])->get();

        if($salary->count() == 0){
        $pendingsalary = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->where('employee_status','Working')
            ->get();
        $totalpendingsalary = $pendingsalary->count();
        }

        elseif($salary->count() > 0)
        {
        foreach($salary as $salary){
            $item[] = $salary['salary_employeelist_id'];
        }
        $pendingsalary = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->whereNotIn('employeelist_id',$item)
            ->where('employee_status','Working')
            ->get();
        $totalpendingsalary = $pendingsalary->count();
        }
        return view('home.salary.pendingsalary',['pendingsalary'=>$pendingsalary,'totalpendingsalary'=>$totalpendingsalary]);
    }

    public function createsalary($id){
        $item = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->where(['employeelist_id'=>$id])
            ->first();
        return view('home.salary.createsalary',['item'=>$item]);
    }

    public function savesalary(Request $request){

        $employeelist_id = $request->employeelist_id;
        $month = $request->month_id;
        $year = $request->year_id;
        $absentday = $request->absent_day;
        $paymatrix_id = $request->paymatrix_id;
        $totalmonthday = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $user_email = session()->get('user')['user_email'];
        $paymatrix = paymatrix::where(['paymatrix_id'=>$paymatrix_id])->first();

        // Calculate Salary

        $da = $paymatrix['paymatrix_dearness_allowance']/100 * $paymatrix['paymatrix_base_salary'];
        $hra = $paymatrix['paymatrix_house_rent_allowance']/100 * $paymatrix['paymatrix_base_salary'];
        $gross_salary = $paymatrix['paymatrix_base_salary'] + $da + $hra + $paymatrix['paymatrix_transport_allowance'] + $paymatrix['paymatrix_medical_allowance'];
        $deduction = $paymatrix['paymatrix_provident_fund'] + $paymatrix['paymatrix_income_tax'] + $paymatrix['paymatrix_insurance'];
        $netsalary = $gross_salary - $deduction;
        $netsalaryperday = $netsalary/$totalmonthday;
        $absentdeduction = $netsalaryperday * $absentday;
        echo $totalnetsalary = $netsalary - $absentdeduction;

        // Save Salary in Database
        $salary = new salary;
        $salary->salary_paymatrix_id = $paymatrix_id;
        $salary->salary_employeelist_id = $employeelist_id;
        $salary->salary_user_email = $user_email;
        $salary->salary_salary_base_salary = $paymatrix['paymatrix_base_salary'];
        $salary->salary_dearness_allowance = $da;
        $salary->salary_house_rent_allowance = $hra;
        $salary->salary_transport_allowance = $paymatrix['paymatrix_transport_allowance'];
        $salary->salary_medical_allowance = $paymatrix['paymatrix_medical_allowance'];
        $salary->salary_provident_fund = $paymatrix['paymatrix_provident_fund'];
        $salary->salary_income_tax = $paymatrix['paymatrix_income_tax'];
        $salary->salary_insurance = $paymatrix['paymatrix_insurance'];
        $salary->salary_gross_salary = $gross_salary;
        $salary->salary_net_salary = $totalnetsalary;
        $salary->month = $month;
        $salary->total_month_day = $totalmonthday;
        $salary->absent_day = $absentday;
        $salary->salary_absent_deduction_amount = $absentdeduction;
        $salary->salary_total_deduction = $deduction + $absentdeduction;
        $salary->year = $year;
        $salary->save();
        session()->put('success', 'Created Successfully');
        return redirect('/salary');
    }

    public function viewsalary($id){
        $salary = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->join('salarys', 'salarys.salary_employeelist_id', '=', 'employeelists.employeelist_id')
            ->where(['salary_id'=>$id])
            ->first();
        return view('home.salary.viewsalary',['salary'=>$salary]);
    }

    public function downloadsalarypdf($id){
        $salary = employeelist::join('posts', 'posts.post_id', '=', 'employeelists.employee_post_id')
            ->join('departments', 'departments.department_id', '=', 'employeelists.employee_department_id')
            ->join('paymatrixs', 'paymatrixs.paymatrix_id', '=', 'employeelists.employee_paymatrix_id')
            ->join('salarys', 'salarys.salary_employeelist_id', '=', 'employeelists.employeelist_id')
            ->where(['salary_id'=>$id])
            ->first();

        $data = [
            'salary' => $salary
        ];
        $pdf = PDF::loadView('home.salary.salarypdf', $data);
        return $pdf->download('salary.pdf');
        //return view('home.salary.salarypdf',['salary'=>$salary]);
    }

    public function editsalary($id){
        $salary = salary::where(['salary_id'=>$id])->first();
        return view('home.salary.editsalary',['salary'=>$salary]);
    }

    public function updatesalary(Request $request){
        $salary = salary::where(['salary_id'=>$request->id]);
        $salary->update(['post_name'=>$request->name]);
        session()->put('success', 'Updated Successfully');
        return redirect('/salary');
    }

    public function deletesalary($id){
        salary::where(['salary_id'=>$id])->delete();
        session()->put('success', 'Deleted Successfully');
        return redirect('/salary');
    }

}
