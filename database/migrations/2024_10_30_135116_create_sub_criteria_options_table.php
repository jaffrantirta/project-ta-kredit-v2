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
        Schema::create('sub_criteria_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_criteria_id')->constrained()->onDelete('cascade');
            $table->string('option_description', 100);
            $table->float('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_criteria_options');
    }
};
