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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id('consult_id');
            $table->unsignedBigInteger('consult_patientid');
            $table->string('consult_diagnosis', 255);
            $table->string('consult_treatmentnotes', 255);
            $table->string('consult_remark', 255);
            $table->date('consult_date')->nullable();
            $table->time('consult_timein')->nullable();
            $table->time('consult_timeout')->nullable();
            $table->integer('consult_timespent')->nullable();

            $table->foreign('consult_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
