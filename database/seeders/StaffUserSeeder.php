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
        'user_email'    => 'remarcjohn9271@gmail.com',
        'user_position' => 'Admin',
        'user_role'     => 'Admin', 
        'user_status'   => 'Active',
        'user_profile'  => 'default.png',
        'user_password' => Hash::make('secret123')
        ]);
 
    } 
}
 