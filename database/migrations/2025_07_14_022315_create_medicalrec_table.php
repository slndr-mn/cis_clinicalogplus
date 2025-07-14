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
        Schema::create('medicalrec', function (Blueprint $table) {
            $table->id('medicalrec_id');
            $table->unsignedBigInteger('medicalrec_patientid');
            $table->string('medicalrec_filename');
            $table->string('medicalrec_file')->nullable();
            $table->string('medicalrec_comment')->nullable();
            $table->date('medicalrec_dateadded')->nullable();
            $table->time('medicalrec_timeadded')->nullable();

            $table->foreign('medicalrec_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicalrec');
    }
};
