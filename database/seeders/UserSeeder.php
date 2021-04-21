<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_email' => 'rajgovindjangid2@gmail.com',
            'user_first_name' => 'Raj Govind',
            'user_last_name' => 'Jangid',
            'user_phoneno' => '9876543210',
            'password' => Hash::make('password'),
            'user_type' => 'Admin',
        ]);
    }
}
