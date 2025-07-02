<?php

namespace Database\Seeders;

use App\Models\PatientStudents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientUsers;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Create patient record (general data)
        $patient = PatientUsers::create([
            'patient_fname' => 'Juan',
            'patient_lname' => 'Dela Cruz',
            'patient_mname' => 'Santos',
            'patient_dob' => '2002-01-15',
            'patient_email' => 'juan@student.com', // model handles encryption + hashing
            'patient_connum' => '09123456789',
            'patient_sex' => 'Male',
            'patient_patienttype' => 'Student',
            'patient_profile' => 'default.png',
            'patient_password' => Hash::make('password123'),
            'patient_status' => 'Active',
            'patient_code' => 123456,
        ]);

        // Create student-specific record
        PatientStudents::create([
            'student_idnum' => '2023-00001',
            'student_patientid' => $patient->patient_id,
            'student_program' => 'BSIT',
            'student_major' => 'Software Engineering',
            'student_year' => 3,
            'student_section' => 'A',
        ]);
    }
}
