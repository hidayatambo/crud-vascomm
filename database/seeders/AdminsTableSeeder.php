<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan admin contoh
        DB::table('admins')->insert([
            'name' => 'Admin Contoh',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
        ]);
    }
}
