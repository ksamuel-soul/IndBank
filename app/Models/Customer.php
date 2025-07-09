<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        'Account_No',
        'Full_Name',
        'DOB',
        'Mobile_No',
        'Address',
        'PAN',
        'UIDAI',
        'Email',
        'Password',
        'Balance'
    ];
}
