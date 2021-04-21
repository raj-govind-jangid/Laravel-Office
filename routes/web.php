<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaryPayController;
use App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Login Url
Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'logincheck']);

Route::get('/logout',[UserController::class,'logout']);

// Home Url

Route::group(['middleware' => 'UserCheck'], function () {

Route::get('/',[HomeController::class,'home']);

// Employee Url

Route::get('/employee',[HomeController::class,'employee']);

Route::get('/createemployee',[HomeController::class,'createemployee']);

Route::post('/saveemployee',[HomeController::class,'saveemployee']);

Route::get('/pendingemployee',[HomeController::class,'pendingemployee']);

Route::get('/viewemployee/{id}',[HomeController::class,'viewemployee']);

Route::get('/pendingaccept/{id}',[HomeController::class,'pendingaccept']);

Route::get('/pendingreject/{id}',[HomeController::class,'pendingreject']);

Route::get('/editemployee/{id}',[HomeController::class,'editemployee']);

Route::post('/updateemployee',[HomeController::class,'updateemployee']);

Route::get('/deleteemployee/{id}',[HomeController::class,'deleteemployee']);

// Post Url

Route::get('/post',[HomeController::class,'post']);

Route::get('/createpost',[HomeController::class,'createpost']);

Route::post('/savepost',[HomeController::class,'savepost']);

Route::get('/editpost/{id}',[HomeController::class,'editpost']);

Route::post('/updatepost',[HomeController::class,'updatepost']);

Route::get('/deletepost/{id}',[HomeController::class,'deletepost']);

// Department Url

Route::get('/department',[HomeController::class,'department']);

Route::get('/createdepartment',[HomeController::class,'createdepartment']);

Route::post('/savedepartment',[HomeController::class,'savedepartment']);

Route::get('/editdepartment/{id}',[HomeController::class,'editdepartment']);

Route::post('/updatedepartment',[HomeController::class,'updatedepartment']);

Route::get('/deletedepartment/{id}',[HomeController::class,'deletedepartment']);

// Pay Url

Route::get('/pay',[SalaryPayController::class,'pay']);

Route::get('/createpay',[SalaryPayController::class,'createpay']);

Route::post('/savepay',[SalaryPayController::class,'savepay']);

Route::get('/editpay/{id}',[SalaryPayController::class,'editpay']);

Route::post('/updatepay',[SalaryPayController::class,'updatepay']);

Route::get('/deletepay/{id}',[SalaryPayController::class,'deletepay']);

// Salary Url

Route::get('/salary',[SalaryPayController::class,'salary']);

Route::get('/pendingsalary',[SalaryPayController::class,'pendingsalary']);

Route::get('/createsalary/{id}',[SalaryPayController::class,'createsalary']);

Route::post('/savesalary',[SalaryPayController::class,'savesalary']);

Route::get('/viewsalary/{id}',[SalaryPayController::class,'viewsalary']);

Route::get('/downloadsalarypdf/{id}',[SalaryPayController::class,'downloadsalarypdf']);

Route::get('/editsalary/{id}',[SalaryPayController::class,'editsalary']);

Route::post('/updatesalary',[SalaryPayController::class,'updatesalary']);

Route::get('/deletesalary/{id}',[SalaryPayController::class,'deletesalary']);

});

//Middleware SuperAdmin

Route::group(['middleware' => 'SuperAdminCheck'], function () {

//Admin Url

Route::get('/admin',[SuperAdmin::class,'admin']);

Route::get('/createuser',[SuperAdmin::class,'createuser']);

Route::post('/createuser',[SuperAdmin::class,'saveuser']);

Route::get('/viewuser/{id}',[SuperAdmin::class,'viewuser']);

Route::get('/edituser/{id}',[SuperAdmin::class,'edituser']);

Route::post('/updateuser',[SuperAdmin::class,'updateuser']);

Route::get('/deleteuser/{id}',[SuperAdmin::class,'deleteuser']);

Route::get('/changepassword/{id}',[SuperAdmin::class,'changepassword']);

Route::post('/changepassword',[SuperAdmin::class,'updatepassword']);

});
