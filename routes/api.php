<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanEnquireController;
use App\Http\Controllers\AuthEmpController;
use App\Http\Controllers\AccController;
use App\Http\Controllers\AuthCustomerController;
use App\Http\Controllers\Loan_application;
use App\Http\Controllers\TranscationController;

Route::post('/emp_reg', [AuthEmpController::class, 'Emp_Register']);
Route::get('/emp_login', function(){
    return view('Emp_Login');
});
Route::post('/emp_login', [AuthEmpController::class, 'Emp_Login']);
Route::post('/emp_logout', [AuthEmpController::class, 'Emp_Logout'])->middleware('auth:sanctum');

Route::get('/enq_det/{Enq_No}', [LoanEnquireController::class, 'enq_det']);

Route::post('/cus_reg/{acc_no}', [AuthCustomerController::class, 'Customer_Register']);

Route::get('/cus_login', function(){
    return view('customer_login');
});
Route::get('/cus_home', function(){
    return view('customer_home');
});
Route::post('/cus_login', [AuthCustomerController::class, 'Customer_Login']);
Route::post('/cus_logout', [AuthCustomerController::class, 'Customer_Logout'])->middleware('auth:sanctum');

Route::post('/enq_det_reg', [LoanEnquireController::class, 'enq_det_reg']);

Route::get('/acc', function(){
    return view('Accounts_home');
});

Route::get('/tr_funds', function(){
    return view('transfer_funds');
});

Route::get('/acc_sum', function(){
    return view('cus_acc_sum');
});

Route::get('/saving_current', function(){
    return view('s&c_acc');
});

Route::post('/acc_open_det', [AccController::class, 'acc_open_det']);

Route::get('/emp_home', function(){
    return view('Emp_Home');
});

Route::get('/loan_app', function(){
    return view('loans_app');
});
Route::post('/loan_application', [Loan_application::class, 'loan_application']);
Route::get('/loan_fetch/{acc_no}', [Loan_application::class, 'loan_fetch']);
Route::get('/ln_fetch/{email}', [Loan_application::class, 'ln_fetch']);
Route::get('/ln_f/{email}', [AuthCustomerController::class, 'ln_f']);
Route::post('/ln_acc_approve/{acc_no}', [Loan_application::class, 'ln_acc_approve']);
Route::post('/ln_acc_reject/{acc_no}', [Loan_application::class, 'ln_acc_reject']);

Route::post('/loan_debit/{app_no}', [Loan_application::class, 'loan_debit']);
Route::get('/get_ln_dbt_amt/{acc_no}', [Loan_application::class, 'get_ln_dbt_amt']);

Route::get('/acc_det/{acc_no}', [AccController::class, 'acc_det']);
Route::post('/acc_app/{acc_no}', [AccController::class, 'acc_app']);
Route::post('/acc_rej/{acc_no}', [AccController::class, 'acc_rej']);

Route::get('/imb', function(){
    return view('imb_home');
});

Route::get('/cus_login', function(){
    return view('customer_login');
});

Route::get('/forgot_pass', function(){
    return view('forgot_pass');
});

Route::post("/update_pass/{email}", [AuthCustomerController::class, 'update_pass']);

Route::get('/amt/{acc_no}', [AuthCustomerController::class, 'get_amt']);

Route::post('/debit/{acc_no}', [TranscationController::class, 'debit']);

Route::get('/trans_det/{acc_no}', [TranscationController::class, 'trans_det']);

Route::post('/send_otp/{email}', [TranscationController::class, 'send_otp']);
Route::post('/chk_otp', [TranscationController::class, 'chk_otp']);

Route::post('/send_otp_pass/{email}', [AuthCustomerController::class, 'send_otp_pass']);
Route::post('/chk_otp_pass', [AuthCustomerController::class, 'chk_otp_pass']);
Route::get('get_details/{acc_no}', [TranscationController::class, 'get_details']);

Route::post('/send_otp_login/{email}', [AuthCustomerController::class, 'send_otp_login']);
Route::post('/chk_otp_login', [AuthCustomerController::class, 'chk_otp_login']);

Route::post('/send_pass/{acc_no}', [AuthCustomerController::class, 'send_pass']);