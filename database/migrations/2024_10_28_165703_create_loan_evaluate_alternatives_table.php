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
        Schema::create('loan_evaluate_alternatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_credit_id')->constrained()->onDelete('cascade');
            $table->foreignId('criteria_id')->constrained()->onDelete('cascade');
            $table->float('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_evaluate_alternatives');
    }
};
