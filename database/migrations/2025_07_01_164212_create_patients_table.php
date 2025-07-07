<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Main Patients Table
        Schema::create('patients', function (Blueprint $table) { 
            $table->id('patient_id');
            $table->string('patient_lname', 255);
            $table->string('patient_fname', 255);
            $table->string('patient_mname', 255)->nullable();
            $table->date('patient_dob');
            $table->text('patient_email'); // Encrypted  
            $table->string('patient_emailhash', 64)->index(); // For lookup
            $table->text('patient_connum')->nullable();
            $table->enum('patient_sex', ['Male', 'Female']);
            $table->string('patient_profile', 255)->nullable();
            $table->enum('patient_patienttype', ['Student', 'Faculty', 'Staff', 'Extension']);
            $table->string('patient_password', 255); // bcrypt
            $table->enum('patient_status', ['Pending','Active', 'Inactive']);
            $table->mediumInteger('patient_otpcode')->nullable();
            $table->timestamp('patient_otpexpiresat')->nullable();
            $table->timestamps();
        });

        // Students Table
        Schema::create('patstudents', function (Blueprint $table) {
            $table->id('student_id');
            $table->char('student_idnum', 15); // Encrypted, not unique
            $table->unsignedBigInteger('student_patientid');
            $table->string('student_program', 255);
            $table->string('student_major', 255)->nullable();
            $table->integer('student_year');
            $table->string('student_section', 255)->nullable();
            $table->timestamps();

            $table->foreign('student_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

        // Faculty Table
        Schema::create('patfaculties', function (Blueprint $table) {
            $table->id('faculty_id');
            $table->unsignedBigInteger('faculty_patientid');
            $table->char('faculty_idnum', 15); // Encrypted, not unique
            $table->string('faculty_college', 255);
            $table->string('faculty_depart', 255);
            $table->string('faculty_role', 255);
            $table->timestamps();

            $table->foreign('faculty_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

        // Staff Table
        Schema::create('patstaffs', function (Blueprint $table) {
            $table->id('staff_id');
            $table->unsignedBigInteger('staff_patientid');
            $table->char('staff_idnum', 15); // Encrypted, not unique
            $table->string('staff_office', 255);
            $table->string('staff_role', 255);
            $table->timestamps();

            $table->foreign('staff_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

        // Extension Table
        Schema::create('patextensions', function (Blueprint $table) {
            $table->id('exten_id');
            $table->unsignedBigInteger('exten_patientid');
            $table->char('exten_idnum', 15); // Encrypted, not unique
            $table->string('exten_role', 255);
            $table->timestamps();

            $table->foreign('exten_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

        //Patient Address
        Schema::create('pataddresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('address_patientid');
            $table->string('address_region', 100);
            $table->string('address_province', 100);
            $table->string('address_municipality', 100);
            $table->string('address_barangay', 100);
            $table->string('address_prkstrtadd', 255)->nullable();

            $table->foreign('address_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

        //Emergency Contact
         Schema::create('patemergencycontacts', function (Blueprint $table) {
            $table->id('emcon_contactid');
            $table->unsignedBigInteger('emcon_patientid');
            $table->string('emcon_conname', 100);
            $table->string('emcon_relationship', 50);
            $table->string('emcon_connum', 20);

            $table->foreign('emcon_patientid')->references('patient_id')->on('patients')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('patextensions');
        Schema::dropIfExists('patstaffs');
        Schema::dropIfExists('patfaculties');
        Schema::dropIfExists('patstudents');
        Schema::dropIfExists('patients');
    }
};
