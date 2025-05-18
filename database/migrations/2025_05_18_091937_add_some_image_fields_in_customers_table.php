<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('identity_card')->nullable();
            $table->string('family_card')->nullable();
            $table->string('guarantee_document')->nullable();
            $table->string('salary_slip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('identity_card');
            $table->dropColumn('family_card');
            $table->dropColumn('guarantee_document');
            $table->dropColumn('salary_slip');
        });
    }
};
