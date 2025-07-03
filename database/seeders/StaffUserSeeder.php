<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\StaffUser;

class StaffUserSeeder extends Seeder
{
    public function run(): void
    {
       StaffUser::create([
        'user_idnum'    => '202312348',
        'user_fname'    => 'Juan',
        'user_lname'    => 'Dela Cruz',
        'user_mname'    => 'Santos',
        'user_email'    => 'gmdcasia00136@usep.edu.ph',
        'user_contact'  => '09123456789',
        'user_address'  => 'Tagum City',
        'user_position' => 'Admin',
        'user_role'     => 'Admin',
        'user_status'   => 'Active',
        'user_profile'  => 'default.png',
        'user_password' => Hash::make('password123'),
        'user_code'     => 123456,
        ]);

    } 
}
 