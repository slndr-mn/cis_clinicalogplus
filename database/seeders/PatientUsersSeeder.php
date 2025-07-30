<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Models\PatientUsers;

class PatientUsersSeeder extends Seeder
{
    public function run(): void
    {
        PatientUsers::create([
            'patient_fname'       => 'John',
            'patient_lname'       => 'Doe',
            'patient_mname'       => 'M',
            'patient_email'       => 'remarcjohn927@gmail.com',
            'patient_connum'      => '09123456789',
            'patient_dob'         => '2000-01-01',
            'patient_sex'         => 'Male',
            'patient_profile'     => 'default.png',
            'patient_patienttype' => 'Student', // this acts as "role"
            'patient_password'    => Hash::make('secret123'),
            'patient_status'      => 'Active',
        ]);
    }
}
