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
        Schema::create('loan__enquires', function (Blueprint $table) {
            $table->id();
            $table->string("First_Name");
            $table->string("Last_Name");
            $table->string("Email");
            $table->string("Phone_No");
            $table->string("Loan_Type");
            $table->string("Enq_No");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan__enquires');
    }
};
