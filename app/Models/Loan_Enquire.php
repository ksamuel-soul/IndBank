<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_Enquire extends Model
{
    /** @use HasFactory<\Database\Factories\LoanEnquireFactory> */
    use HasFactory;
    protected $fillable = [
        'First_Name',
        'Last_Name',
        'Email',
        'Phone_No',
        'Loan_Type',
        'Enq_No'
    ];
}
