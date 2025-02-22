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
        Schema::table('job_circulars', function (Blueprint $table) {
            $table->after('id', function (Blueprint $table) {
                $table->foreignId('employer_id')->on('employers')->reference('id')->onDelete('cascade');
            });
          
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('job_circulars','employer_id');
    }
};
