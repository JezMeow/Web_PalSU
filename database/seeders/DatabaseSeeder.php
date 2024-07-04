<?php

namespace Database\Seeders;

use App\Models\Appointments;
use App\Models\Employees;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $employee  = Employees::create([
            'first_name' => 'Administrator',
            'last_name' => '',
            'emp_name' => 'Administrator',
        ]);

        User::create([
            'emp_id' => $employee->id,
            'name' => 'Administrator',
            'username' => 'Admin', // Or any unique username
            'email' => 'sample@sample.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Password'), // Use a strong password
            'UserType' => 'Administrative User', //Account Type *Administrative User, *Personal User, & *Supervisor
        ]);

        Appointments::create([
            'appointment_desc' => 'Permanent',
            'appointment_abbrev' => 'Perm',
            'appointment_class' => 'Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Temporary',
            'appointment_abbrev' => 'Temp',
            'appointment_class' => 'Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Contractual',
            'appointment_abbrev' => 'Cont',
            'appointment_class' => 'Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Co-Terminous',
            'appointment_abbrev' => 'CT',
            'appointment_class' => 'Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Casual',
            'appointment_abbrev' => 'Cas',
            'appointment_class' => 'Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Part-Time',
            'appointment_abbrev' => 'PT',
            'appointment_class' => 'Non-Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Contract of Service',
            'appointment_abbrev' => 'COS',
            'appointment_class' => 'Non-Regular',
        ]);

        Appointments::create([
            'appointment_desc' => 'Job Order',
            'appointment_abbrev' => 'JO',
            'appointment_class' => 'Non-Regular',
        ]);
    }
}
