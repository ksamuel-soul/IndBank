<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    /** @use HasFactory<\Database\Factories\AccountsFactory> */
    use HasFactory;

    protected $fillable = [
        'Account_No',
        'Full_Name',
        'DOB',
        'Email',
        'Mobile_No',
        'Address',
        'PAN',
        'UIDAI',
        'Acc_Type',
        'Initial_Amt',
        'Status'
    ];
}
