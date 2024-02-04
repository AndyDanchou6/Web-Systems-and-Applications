<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('andydanchou06'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Perd',
            'email' => 'perd@gmail.com',
            'password' => bcrypt('letsgomyboy'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('korewamendodesu123'),
            'role' => 1,
        ]);
    }
}
