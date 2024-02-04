<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Melchard',
            'email' => 'melchard@gmail.com',
            'password' => Hash::make('andydanchou06'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Perd',
            'email' => 'perd@gmail.com',
            'password' => Hash::make('letsgomyboy'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('korewamendodesu123'),
            'role' => 1,
        ]);
    }
}
