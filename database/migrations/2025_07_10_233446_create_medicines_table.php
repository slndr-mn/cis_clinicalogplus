<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Create 'medicine' table
        Schema::create('medicine', function (Blueprint $table) {
            $table->id('medicine_id'); // auto-increment primary key
            $table->string('medicine_name', 100)->unique();
            $table->string('medicine_category', 50);
        });

        // Create 'medstock' table 
        Schema::create('medstock', function (Blueprint $table) {
            $table->id('medstock_id'); // auto-increment primary key
            $table->unsignedBigInteger('medicine_id'); // foreign key
            $table->string('medstock_unit', 10)->nullable();
            $table->integer('medstock_qty');
            $table->integer('medstock_origqty');
            $table->string('medstock_dosage', 50)->nullable();
            $table->date('medstock_dateadded')->nullable();
            $table->time('medstock_timeadded')->nullable();
            $table->date('medstock_expirationdt')->nullable();
            $table->boolean('medstock_disable')->default(false);

            $table->foreign('medicine_id')->references('medicine_id')->on('medicine')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medstock');
        Schema::dropIfExists('medicine');
    }
};