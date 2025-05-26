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
        Schema::create('send_to_investigator_leaders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('personal_photo')->nullable();
            $table->string('interview')->nullable();
            $table->string('dna_evidence')->nullable();
            $table->string('forensic_evidence')->nullable();
            $table->string('clinical_report')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_to_investigator_leaders');
    }
};
