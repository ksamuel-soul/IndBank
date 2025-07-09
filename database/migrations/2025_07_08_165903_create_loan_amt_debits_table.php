<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_amt_debits', function (Blueprint $table) {
            $table->id();
            $table->string('Application_No');
            $table->string('Account_No');
            $table->string('Name');
            $table->string('PAN');
            $table->string('UIDAI');
            $table->string('Email');
            $table->string('Total_Loan_Amt');
            $table->string('Repay_Tenure');
            $table->string('EMI');
            $table->string('Months');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_amt_debits');
    }
};
