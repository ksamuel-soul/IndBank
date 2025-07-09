<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;

    protected $fillable = [
        'Transaction_Id',
        'Date',
        'Description',
        'Mode',
        'Trans_Type',
        'From',
        'To',
        'Amount',
        'F_Balance',
        'T_Balance'
    ];
}
