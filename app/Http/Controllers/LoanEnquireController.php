<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan_Enquire;

class LoanEnquireController extends Controller
{
    public function enq_det_reg(Request $request)
    {
        $fields = $request->validate([
            'First_Name'=>'required|max:255',
            'Last_Name'=>'required|max:255',
            'Email'=>'required|max:255|unique:loan__enquires,Email',
            'Phone_No'=>'required|max:255|unique:loan__enquires,Phone_No',
            'Loan_Type'=>'required|max:255'
        ]);
        if($fields['Loan_Type'] == 'Home_Loan')
        {
            $rand_no = rand(00000, 99999);
            $post = Loan_Enquire::create([
                'First_Name'=>$fields['First_Name'],
                'Last_Name'=>$fields['Last_Name'],
                'Email'=>$fields['Email'],
                'Phone_No'=>$fields['Phone_No'],
                'Loan_Type'=>$fields['Loan_Type'],
                'Enq_No'=>'HL-'.$rand_no
            ]);
        }
        else if($fields['Loan_Type'] == 'Car_Loan')
        {
            $rand_no = rand(00000, 99999);
            $post = Loan_Enquire::create([
                'First_Name'=>$fields['First_Name'],
                'Last_Name'=>$fields['Last_Name'],
                'Email'=>$fields['Email'],
                'Phone_No'=>$fields['Phone_No'],
                'Loan_Type'=>$fields['Loan_Type'],
                'Enq_No'=>'CL-'.$rand_no
            ]);
        }
        else if($fields['Loan_Type'] == 'Personal_Loan')
        {
            $rand_no = rand(00000, 99999);
            $post = Loan_Enquire::create([
                'First_Name'=>$fields['First_Name'],
                'Last_Name'=>$fields['Last_Name'],
                'Email'=>$fields['Email'],
                'Phone_No'=>$fields['Phone_No'],
                'Loan_Type'=>$fields['Loan_Type'],
                'Enq_No'=>'PL-'.$rand_no
            ]);
        }

        else if($fields['Loan_Type'] == 'Educational_Loan')
        {
            $rand_no = rand(00000, 99999);
            $post = Loan_Enquire::create([
                'First_Name'=>$fields['First_Name'],
                'Last_Name'=>$fields['Last_Name'],
                'Email'=>$fields['Email'],
                'Phone_No'=>$fields['Phone_No'],
                'Loan_Type'=>$fields['Loan_Type'],
                'Enq_No'=>'EL-'.$rand_no
            ]);
        }
        return [
            'Message'=>'Record Entered..!!!',
            'Status'=>200,
            'User_Details'=>$post
        ];
    }

    public function enq_det(Request $request, $Enq_No)
    {
        $app_search = Loan_Enquire::where('Enq_No', $Enq_No)->first();

        if($app_search)
        {
            return [
                'Message'=>'Application_Found..!!!',
                'Status'=>200,
                'User_Details'=>$app_search
            ];
        }
        else
        {
            return [
                'Message'=>'Application_Not_Found..!!!',
                'Status'=>404
            ];
        }
    }
}
