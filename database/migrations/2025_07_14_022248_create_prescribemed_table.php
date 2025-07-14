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
       Schema::create('prescribemed', function (Blueprint $table) {
            $table->id('pm_id');
            $table->unsignedBigInteger('pm_consultid');
            $table->unsignedBigInteger('pm_medstockid');
            $table->integer('pm_medqty');

            $table->foreign('pm_consultid')->references('consult_id')->on('consultations')->onDelete('cascade');
            $table->foreign('pm_medstockid')->references('medstock_id')->on('medstock')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescribemed');
    }
};
