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
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'admin.png',
            'rol' => 0,
        ]);

        User::insert([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'admin.png',
            'rol' => 0,
        ]);

        User::insert([
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
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

        User::insert([
            'name' => 'Alumno2',
            'email' => 'alumno2@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'alumno.png',
            'rol' => 1
        ]);

        User::insert([
            'name' => 'Alumno3',
            'email' => 'alumno3@gmail.com',
            'password' => Hash::make('1234'),
            'imagen' => 'alumno.png',
            'rol' => 1
        ]);
    }
}
