<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Produk 1',
                'description' => 'Deskripsi produk 1',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Deskripsi produk 2',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Deskripsi produk 3',
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 1',
                'description' => 'Deskripsi produk 1',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Deskripsi produk 2',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Deskripsi produk 3',
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 1',
                'description' => 'Deskripsi produk 1',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Deskripsi produk 2',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Deskripsi produk 3',
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 1',
                'description' => 'Deskripsi produk 1',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Deskripsi produk 2',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Deskripsi produk 3',
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 1',
                'description' => 'Deskripsi produk 1',
                'price' => 100.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 2',
                'description' => 'Deskripsi produk 2',
                'price' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk 3',
                'description' => 'Deskripsi produk 3',
                'price' => 200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data produk lainnya di sini
        ]);
        DB::table('admins')->insert([
            'name' => 'Admin Contoh',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
        ]);
        
    }
}
