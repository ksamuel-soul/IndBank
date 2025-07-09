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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('Transaction_Id');
            $table->string('Date');
            $table->string('Description');
            $table->string('Mode');
            $table->string('Trans_Type');
            $table->string('From');
            $table->string('To');
            $table->string('Amount');
            $table->string('F_Balance');
            $table->string('T_Balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
