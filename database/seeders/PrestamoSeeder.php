<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prestamo::insert([
            'libro_id' => 1,
            'usuario' => 4,
            'fecha_prestamo' => Carbon::parse('2020-02-19'),
            'fecha_devolucion' => Carbon::parse('2020-02-25')
        ]);
        Prestamo::insert([
            'libro_id' => 5,
            'usuario' => 4,
            'fecha_prestamo' => Carbon::now()->subDays(3)
        ]);
        Prestamo::insert([
            'libro_id' => 2,
            'usuario' => 5,
            'fecha_prestamo' => Carbon::parse('2020-02-11'),
            'fecha_devolucion' => Carbon::parse('2020-02-18')
        ]);
        Prestamo::insert([
            'libro_id' => 4,
            'usuario' => 5,
            'fecha_prestamo' => Carbon::parse('2020-02-21')
        ]);
    }
}
