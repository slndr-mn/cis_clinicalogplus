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
       Schema::create('medissued', function (Blueprint $table) {
            $table->id('mi_id');
            $table->unsignedBigInteger('mi_medstockid');
            $table->integer('mi_medqty');
            $table->date('mi_date')->nullable();

            $table->foreign('mi_medstockid')->references('medstock_id')->on('medstock')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medissued');
    }
};
 