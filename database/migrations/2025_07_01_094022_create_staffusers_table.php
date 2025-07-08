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
        Schema::create('staffusers', function (Blueprint $table) {
            $table->id('user_id');
            $table->char('user_idnum', 15)->unique();
            $table->string('user_fname', 255); 
            $table->string('user_lname', 255); 
            $table->string('user_mname', 255)->nullable(); 
            $table->text('user_email');
            $table->string('email_hash', 64)->index(); 
            $table->text('user_contact')->nullable();
            $table->text('user_address')->nullable();
            $table->string('user_position', 50);
            $table->enum('user_role', ['Super Admin', 'Admin', 'Physician']);
            $table->enum('user_status', ['Pending' ,'Active', 'Inactive']);
            $table->string('user_profile', 255)->nullable();
            $table->char('user_password', 60);
            $table->mediumInteger('user_otpcode')->nullable();
            $table->timestamp('user_otpexpiresat')->nullable();
            $table->timestamps(); 
        });   
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminusers');
    } 
};
