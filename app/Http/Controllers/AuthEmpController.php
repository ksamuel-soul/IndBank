<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class AuthEmpController extends Controller
{
    public function Emp_Register(Request $request)
    {
        $fields = $request->validate([
        'First_Name'=>'required|max:255',
        'Last_Name'=>'required|max:255',
        'Age'=>'required|max:255',
        'Gender'=>'required|max:255',
        'Designation'=>'required|max:255',
        'Phone_No'=>'required|max:255|unique:employees,Phone_No',
        'Email'=>'required|max:255|unique:employees,Email',
        'Password'=>'required|max:255|confirmed'
        ]);

        $post = employee::create([
            'First_Name'=>$fields['First_Name'],
            'Last_Name'=>$fields['Last_Name'],
            'Age'=>$fields['Gender'],
            'Gender'=>$fields['First_Name'],
            'Designation'=>$fields['Designation'],
            'Phone_No'=>$fields['Phone_No'],
            'Email'=>$fields['Email'],
            'Password'=>Hash::make($fields['Password'])
        ]);

        return [
            'Message'=>'Record added successfully into the database..!!!',
            'Status'=>200,
            'Employee_Details'=>$post
        ];
    }

    public function Emp_Login(Request $request)
    {
        $request->validate([
            'Email'=>'required|max:255',
            'Password'=>'required|max:255'
        ]);
        $user_search = employee::where('Email', $request->Email)->first();

        if(!$user_search)
        {
            return [
                'Message'=>'User_Not Found..!!!',
                'Status'=>4044
            ];
        }
        else if(!Hash::check($request->Password, $user_search->Password))
        {
            return [
                'Message'=>'Invalid Password..!!!',
                'Status'=>404
            ];
        }
        else
        $token = $user_search->createToken($user_search->First_Name);
        {
            return [
                'User_Details'=>$user_search,
                'Message'=>"Login_Successfull..!!!",
                'Status'=>200,
                'Token'=>$token->plainTextToken
            ];
        }
    }

    public function Emp_Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return [
            'Message'=>'LoggedOut_Successfully..!!!',
            'Status'=>200
        ];
    }

    public function emp_details(Request $request, $email)
    {
        $search_emp = employee::where('Email', $email)->first();
        return [
            'Emp_designation'=>$search_emp->Designation,
            'Status'=>200,
            'Message'=>"Employee Designation Found..!!!"
        ];
    }
}
