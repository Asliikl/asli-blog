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
        \App\Models\Admin::create([
            'username' => 'Aslıhan İkiel',
            'email' => 'aslihanikiel@gmail.com',
            'password'=> \Hash::make('123456')
        ]);
    }
}
