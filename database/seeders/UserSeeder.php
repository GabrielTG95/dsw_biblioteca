<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'admin.png',
            'rol' => 0,
        ]);

        User::insert([
            'name' => 'Alumno1',
            'email' => 'alumno1@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'alumno.png',
            'rol' => 1
        ]);
    }
}
