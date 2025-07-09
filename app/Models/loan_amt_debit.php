<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class loan_amt_debit extends Model
{
    /** @use HasFactory<\Database\Factories\LoanAmtDebitFactory> */
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        'Application_No',
        'Account_No',
        'Name',
        'PAN',
        'UIDAI',
        'Email',
        'Total_Loan_Amt',
        'Repay_Tenure',
        'EMI',
        'Months'
    ];
}
