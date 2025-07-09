<?php

namespace App\Models;

use Illuminate\Console\Concerns\HasParameters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'First_Name',
        'Last_Name',
        'Age',
        'Gender',
        'Designation',
        'Phone_No',
        'Email',
        'Password'
    ];
}
