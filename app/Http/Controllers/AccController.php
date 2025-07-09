<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Accounts;

class AccController extends Controller
{
    public function acc_open_det(Request $request)
    {
        $fields = $request->validate([
            'Full_Name'=>'required|max:255',
            'DOB'=>'required|max:255',
            'Email'=>'required|max:255|unique:accounts,Email',
            'Mobile_No'=>'required|max:255|unique:accounts,Mobile_No',
            'Address'=>'required|max:255',
            'PAN'=>'required|max:255|unique:accounts,PAN',
            'UIDAI'=>'required|max:255|unique:accounts,UIDAI',
            'Acc_Type'=>'required|max:255',
            'Initial_Amt'=>'required|max:255',
        ]);
        
        $acc_no_gen = rand(1111111111, 9999999999);
        $post = accounts::create([
            'Account_No'=>$acc_no_gen,
            'Full_Name'=>$fields['Full_Name'],
            'DOB'=>$fields['DOB'],
            'Email'=>$fields['Email'],
            'Mobile_No'=>$fields['Mobile_No'],
            'Address'=>$fields['Address'],
            'PAN'=>$fields['PAN'],
            'UIDAI'=>$fields['UIDAI'],
            'Acc_Type'=>$fields['Acc_Type'],
            'Initial_Amt'=>$fields['Initial_Amt'],
            'Status'=>'Pending'
        ]);

        return [
            'Message'=>'Account Created Successfully..!!!',
            'Status'=>200,
            'User_Details'=>$post
        ];
    }

    public function acc_det(Request $request, $acc_no)
    {
        $search_acc = accounts::where('Account_No', $acc_no)->where('Status', 'Pending')->first();
        if(!$search_acc)
        {
            return [
                'Status'=>404,
                'Message'=>'Account with '.$acc_no.' not found',
            ];
        }
        else
        {
            return [
                'Acc_Details'=>[$search_acc],
                'Status'=>200,
                'Message'=>'Account with '.$acc_no.' found'
            ];
        }
    }

    public function acc_app(Request $request, $acc_no)
    {
        $app_acc = Accounts::where('Account_No', $acc_no)->where('Status', 'Pending')->first();

        if(!$app_acc)
        {
            return [
                'Message'=>'No Account Found..!!!',
                'Status'=>404
            ];
        }
        else
        {
            $app_acc->Status='Approved';
            $app_acc->save();
            return[
                'Message'=>'Account Approved',
                'Status'=>200
            ];
        }
    }


    public function acc_rej(Request $request, $acc_no)
    {
        $app_acc = Accounts::where('Account_No', $acc_no)->where('Status', 'Pending')->first();

        if(!$app_acc)
        {
            return [
                'Message'=>'No Account Found..!!!',
                'Status'=>404
            ];
        }
        else
        {
            $app_acc->Status='Rejected';
            $app_acc->save();
            return[
                'Message'=>'Account Rejected',
                'Status'=>200
            ];
        }
    }
}
