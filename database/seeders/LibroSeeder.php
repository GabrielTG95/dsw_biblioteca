<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++){
            Libro::insert([
                'isbn' => '978-84-9043-931-9',
                'titulo' => 'Guardianes de La Ciudadela - El Bestiario de Axlin',
                'autor' => 'Laura Gallego',
                'categoria' => 1,
                'editorial' => 'Montena',
                'edicion' => 11,
                'fecha_publicacion' => 2018,
                'portada' => 'elbestiariodeaxlin.jpg',
                'disponible' => 0,
                'link' => 'https://es.lipsum.com/',
                'sinopsis' =>
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper auctor mi.
                     Pellentesque id nisi vitae lorem volutpat auctor a non nibh. Sed ut luctus nulla, sed gravida
                      mauris. Donec vel magna lorem. Etiam sit amet diam rutrum, pellentesque sem ac, venenatis massa.
                       Duis vestibulum fringilla dapibus. Maecenas pretium eros eu dignissim condimentum. Proin viverra
                        nunc ac nisl ullamcorper, non placerat velit consectetur. Sed mattis mollis tempor. Aliquam erat
                         volutpat.',
            ]);
            Libro::insert([
                'isbn' => '978-84-17347-62-8',
                'titulo' => 'Dune',
                'autor' => 'Frank Herbert',
                'categoria' => 4,
                'editorial' => 'Nova',
                'edicion' => 3,
                'fecha_publicacion' => 2019,
                'portada' => 'dune.jpg',
                'disponible' => 0,
                'link' => 'https://es.lipsum.com/',
                'sinopsis' =>
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper auctor mi.
                     Pellentesque id nisi vitae lorem volutpat auctor a non nibh. Sed ut luctus nulla, sed gravida
                      mauris. Donec vel magna lorem. Etiam sit amet diam rutrum, pellentesque sem ac, venenatis massa.
                       Duis vestibulum fringilla dapibus. Maecenas pretium eros eu dignissim condimentum. Proin viverra
                        nunc ac nisl ullamcorper, non placerat velit consectetur. Sed mattis mollis tempor. Aliquam erat
                         volutpat.',
            ]);
            /*Libro::insert([
                'isbn' => '978-84-18002-50-2',
                'titulo' => 'El Señor de los Anillos',
                'autor' => 'password',
                'categoria' => 'Fantasía',
                'editorial' => 'HarperCollins',
                'edicion' => 1,
                'fecha_publicacion' => 2002,
                'portada' => '20220225011413.png',
                'disponible' => 0,
            ]);
            Libro::insert([
                'isbn' => '978-84-18002-50-2',
                'titulo' => 'El Señor de los Anillos',
                'autor' => 'password',
                'categoria' => 'Fantasía',
                'editorial' => 'HarperCollins',
                'edicion' => 1,
                'fecha_publicacion' => 2002,
                'portada' => '20220225011413.png',
                'disponible' => 0,
            ]);*/
        }
    }
}
