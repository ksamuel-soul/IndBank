<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loan_app;
use App\Models\Customer;
use App\Models\loan_amt_debit;

class Loan_application extends Controller
{
    public function loan_application(Request $request)
    {
        $fields = $request->validate([
            'First_Name'=>'required|max:255',
            'Last_Name'=>'required|max:255',
            'Email'=>'required|max:255',
            'Phone_No'=>'required|max:255',
            'PAN'=>'required|max:255',
            'UIDAI'=>'required|max:255',
            'Loan_Type'=>'required|max:255',
            'Loan_Amount'=>'required|max:255',
            'Annual_Income'=>'required|max:255',
            'Repay_Tenure'=>'required|max:255'
        ]);

        $chk_email = loan_app::where('Email', $request->Email)->first();
        $chk_phone = loan_app::where('Phone_No', $request->Phone_No)->first();
        $chk_pan = loan_app::where('PAN', $request->PAN)->first();
        $chk_uidai = loan_app::where('UIDAI', $request->UIDAI)->first();

        $chk_cus_pan = Customer::where('PAN', $request->PAN)->first();
        $chk_cus_uidai = Customer::where('UIDAI', $request->UIDAI)->first();

        if(!$chk_email)
        {
            if(!$chk_phone)
            {
                if(!$chk_pan)
                {
                    if(!$chk_uidai)
                    {
                        if($chk_cus_pan)
                        {
                            if($chk_cus_uidai)
                            {
                                $rand_app = rand(111111111, 999999999);
                                $post = loan_app::create([
                                    'Application_No'=>$rand_app,
                                    'App_Status'=>'Pending',
                                    'First_Name'=>$fields['First_Name'],
                                    'Last_Name'=>$fields['Last_Name'],
                                    'Email'=>$fields['Email'],
                                    'Phone_No'=>$fields['Phone_No'],
                                    'PAN'=>$fields['PAN'],
                                    'UIDAI'=>$fields['UIDAI'],
                                    'Loan_Type'=>$fields['Loan_Type'],
                                    'Loan_Amount'=>$fields['Loan_Amount'],
                                    'Annual_Income'=>$fields['Annual_Income'],
                                    'Repay_Tenure'=>$fields['Repay_Tenure'],
                                ]);

                                return [
                                    'Message'=>'Application Created Successfully..!!!',
                                    'Status'=>200,
                                    'Details'=>$post
                                ];
                            }
                            else{
                                return [
                                    'Status'=>404,
                                    "Message"=>'Enterd UIDAI No. is not registered with us..!!!'
                                ];
                            }
                        }
                        else{
                            return [
                                'Status'=>404,
                                'Message'=>'Entered Pan is Not Registered With us..!!!'
                            ];
                        }
                    }
                    else{
                        return [
                            'Message'=>'Aadhaar Number Already Taken..!!!',
                            'Status'=>404
                        ];
                    }
                }
                else{
                    return [
                        'Message'=>'Pan Number Already Taken..!!!',
                        'Status'=>404
                    ];
                }
            }
            else
            {
                return [
                    'Message'=>'Give Phone_No is already in use..!!!',
                    'Status'=>404
                ];
            }
        }
        else
        {
            return [
                'Message'=>'Given Email is alredy in use..!!!',
                'Status'=>404
            ];
        }
    }

    public function loan_fetch(Request $request, $acc_no)
    {
        $fetch_acc = loan_app::where('Application_No', $acc_no)->where('App_Status', 'Pending')->first();
        if(!$fetch_acc)
        {
            return [
                'Message'=>'Loan Account Not Found..!!!',
                'Status'=>404
            ];
        }
        else
        {
            return [
                'Acc_details'=>[$fetch_acc],
                'Status'=>200,
                'Message'=>'Account Fetched'
            ];
        }
    }

    public function ln_acc_approve(Request $request, $app_no)
    {
        $search_acc = loan_app::where('Application_No', $app_no)->where('App_Status', 'Pending')->first();
        if($search_acc)
        {
            $search_acc->App_Status = 'Approve';
            $search_acc->save();
            return [
                'Message'=>'Loan Account Approved..!!!',
                'Status'=>200
            ];
        }
        else
        {
            return [
                'Message'=>'Operation Performed..!!!',
                'Status'=>404
            ];
        }
    }

    public function ln_acc_reject(Request $request, $acc_no)
    {
        $search_ln_acc = loan_app::where('Application_No', $acc_no)->where('App_Status', 'Pending')->first();
        if($search_ln_acc)
        {
            $search_ln_acc->App_Status = 'Reject';
            $search_ln_acc->save();
            return [
                'Message'=> "Loan Account Rejected..!!!",
                'Status'=>200
            ];
        }
        else
        {
            return [
                'Message'=>'Operation Performed..!!!',
                'Status'=>404
            ];
        }
    }

    public function ln_fetch(Request $request, $email)
    {
        $sa = loan_app::where('Email', $email)->get();
        if(!$sa)
        {
            return [
                'Message'=>'No Application Found..!!!',
                'Status'=>404
            ];
        }
        else
        {
            return [
                'Details'=>$sa,
                "Message"=>"Application Found..!!!",
                'Status'=>200
            ];
        }
    }

    public function loan_debit(Request $request, $app_no)
    {
        $search_app = loan_app::where('Application_No', $app_no)->first();
        if(!$search_app)
        {
            return [
                'Message'=>'No Such Application Found..!!!',
                'Status'=>404
            ];
        }
        else{
            $request->validate([
                'Months'=>'required|max:255'
            ]);


            $email = $search_app->Email;
            $ln_amt = $search_app->Loan_Amount;
            $tenure = $search_app->Repay_Tenure;
            $calc = (($ln_amt) / (12*(float)$tenure))+($ln_amt*0.05);
            $mnths = (12*(float)$tenure);
            $bnk_acc = Customer::where('Email', $email)->first();
            $chk_mnths = loan_amt_debit::where('Application_No', $app_no)->where('Months', $request->Months)->first();
            if(!$chk_mnths)
            {
                if($request->Months <= $mnths && $request->Months != 0)
                {
                    $emi = $bnk_acc->Balance - $calc;
                    $bnk_acc->Balance = $emi;
                    $bnk_acc->save();

                    $post = loan_amt_debit::create([
                        'Application_No'=>$search_app->Application_No,
                        'Account_No'=>$bnk_acc->Account_No,
                        'Name'=>$bnk_acc->Full_Name,
                        'PAN'=>$bnk_acc->PAN,
                        'UIDAI'=>$bnk_acc->UIDAI,
                        'Email'=>$bnk_acc->Email,
                        'Total_Loan_Amt'=>$search_app->Loan_Amount,
                        'Repay_Tenure'=>$search_app->Repay_Tenure,
                        'EMI'=>$calc,
                        'Months'=>$request->Months
                    ]);

                    return [
                        'Details'=>$post,
                        'Bank_Balance'=>$emi,
                        'EMI'=>$calc,
                        'Message'=>'Loan Amount Debited Successfully..!!!',
                        'Status'=>200
                    ];
                }
                else{
                    return [
                        'Message'=>'Repay Tenure is for only '.$mnths.' months OR Zero Month Entered..!!!',
                        "Status"=>404
                    ];
                }
            }
            else
            {
                return [
                    'Message'=>'Payment Recived for the Month: '.$request->Months,
                    'Status'=>404
                ];
            }
        }
    }

    public function get_ln_dbt_amt(Request $request, $acc_no)
    {
        $cus_search = Customer::where('Account_No', $acc_no)->first();
        $asd = loan_amt_debit::where('Account_No', $cus_search->Account_No)->get();
        if(!$asd)
        {
            return [
                'Message'=>'No Transations yet made..!!!',
                'Status'=>404
            ];
        }
        else {
            return [
                'Details'=>$asd,
                'Message'=>'Loan Amount Debit Records for Application_Number: '.$acc_no,
                'Status'=>200
            ];
        }
    }
}
