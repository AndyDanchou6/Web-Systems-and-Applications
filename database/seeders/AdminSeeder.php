<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Melchard',
            'email' => 'danchou@gmail.com',
            'password' => Hash::make('korewamendodesu123'),
            'role' => 1,
        ]);

        User::create([
            'name' => 'Jhay-R',
            'email' => 'perd@gmail.com',
            'password' => Hash::make('letsgomyboy123'),
            'role' => 1,
        ]);
    }
}
