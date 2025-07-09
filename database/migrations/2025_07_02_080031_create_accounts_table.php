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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('Account_No');
            $table->string('Full_Name');
            $table->string('DOB');
            $table->string('Email');
            $table->string('Mobile_No');
            $table->string('Address');
            $table->string('PAN');
            $table->string('UIDAI');
            $table->string('Acc_Type');
            $table->string('Initial_Amt');
            $table->string('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
