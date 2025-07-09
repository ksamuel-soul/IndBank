<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class loan_app extends Model
{
    /** @use HasFactory<\Database\Factories\LoanAppFactory> */
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'Application_No',
        'App_Status',
        'First_Name',
        'Last_Name',
        'Email',
        'Phone_No',
        'PAN',
        'UIDAI',
        'Loan_Type',
        'Loan_Amount',
        'Annual_Income',
        'Repay_Tenure'
    ];
}
