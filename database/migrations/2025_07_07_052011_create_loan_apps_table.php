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
        Schema::create('loan_apps', function (Blueprint $table) {
            $table->id();
            $table->string('Application_No');
            $table->string('App_Status');
            $table->string('First_Name');
            $table->string('Last_Name');
            $table->string('Email');
            $table->string('Phone_No');
            $table->string('PAN');
            $table->string('UIDAI');
            $table->string('Loan_Type');
            $table->string('Loan_Amount');
            $table->string('Annual_Income');
            $table->string('Repay_Tenure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_apps');
    }
};
