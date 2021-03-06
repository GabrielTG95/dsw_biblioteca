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
        Libro::insert([
            'isbn' => '978-84-9043-931-9',
            'titulo' => 'Guardianes de La Ciudadela - El Bestiario de Axlin'.' | Ejemplar 1',
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
            'titulo' => 'Dune'.' | Ejemplar 1',
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
        Libro::insert([
            'isbn' => '978-84-18002-50-2',
            'titulo' => 'Asedio y Tormenta - GrishaVerse'.' | Ejemplar 1',
            'autor' => 'Leigh Bardugo',
            'categoria' => 5,
            'editorial' => 'Hidra',
            'edicion' => 8,
            'fecha_publicacion' => 2014,
            'portada' => 'asedioYtormenta.jpg',
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
            'isbn' => '978-84-18037-21-4',
            'titulo' => 'El Imperio Final - Edici??n Ilustrada'.' | Ejemplar 1',
            'autor' => 'Brando Sanderson',
            'categoria' => 1,
            'editorial' => 'Nova',
            'edicion' => 1,
            'fecha_publicacion' => 2021,
            'portada' => 'elImperioFinalIlustrada.jpg',
            'disponible' => 1,
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
            'isbn' => '978-84-8441-485-8',
            'titulo' => 'Las Incre??bles Aventuras de Tom Scatterhorn'.' | Ejemplar 1',
            'autor' => 'Henry Chancellor',
            'categoria' => 6,
            'editorial' => 'Montena',
            'edicion' => 1,
            'fecha_publicacion' => 2008,
            'portada' => 'tomScatterhorn.jpg',
            'disponible' => 1,
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
            'isbn' => '978-84-08-08380-1',
            'titulo' => 'Cazadores de Sombras 1 - Ciudad de Hueso'.' | Ejemplar 1',
            'autor' => 'Cassandra Clare',
            'categoria' => 3,
            'editorial' => 'Destino',
            'edicion' => 5,
            'fecha_publicacion' => 2010,
            'portada' => 'cazadoresDeSombras.jpg',
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
            'isbn' => '978-84-672-3978-2',
            'titulo' => 'La torre de la golondrina'.' | Ejemplar 1',
            'autor' => 'Adrej Sapkowski',
            'categoria' => 1,
            'editorial' => 'C??culo de Lectores',
            'edicion' => 2,
            'fecha_publicacion' => 2012,
            'portada' => 'laTorreDeLaGolondrina.jpg',
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
            'isbn' => '978-84-679-2509-8',
            'titulo' => 'Pok??mon Rub?? y Zafiro Vol. 2'.' | Ejemplar 1',
            'autor' => 'Hidenori Kusaka, Satoshi Yamamoto',
            'categoria' => 2,
            'editorial' => 'Norma Editorial',
            'edicion' => 1,
            'fecha_publicacion' => 2016,
            'portada' => 'pokemonRubiZafiro.jpeg',
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
            'isbn' => '978-84-9043-931-9',
            'titulo' => 'Guardianes de La Ciudadela - El Bestiario de Axlin'.' | Ejemplar 2',
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
            'titulo' => 'Dune'.' | Ejemplar 2',
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
        Libro::insert([
            'isbn' => '978-84-18002-50-2',
            'titulo' => 'Asedio y Tormenta - GrishaVerse'.' | Ejemplar 2',
            'autor' => 'Leigh Bardugo',
            'categoria' => 5,
            'editorial' => 'Hidra',
            'edicion' => 8,
            'fecha_publicacion' => 2014,
            'portada' => 'asedioYtormenta.jpg',
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
            'isbn' => '978-84-18037-21-4',
            'titulo' => 'El Imperio Final - Edici??n Ilustrada'.' | Ejemplar 2',
            'autor' => 'Brando Sanderson',
            'categoria' => 1,
            'editorial' => 'Nova',
            'edicion' => 1,
            'fecha_publicacion' => 2021,
            'portada' => 'elImperioFinalIlustrada.jpg',
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
            'isbn' => '978-84-8441-485-8',
            'titulo' => 'Las Incre??bles Aventuras de Tom Scatterhorn'.' | Ejemplar 2',
            'autor' => 'Henry Chancellor',
            'categoria' => 6,
            'editorial' => 'Montena',
            'edicion' => 1,
            'fecha_publicacion' => 2008,
            'portada' => 'tomScatterhorn.jpg',
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
            'isbn' => '978-84-08-08380-1',
            'titulo' => 'Cazadores de Sombras 1 - Ciudad de Hueso'.' | Ejemplar 2',
            'autor' => 'Cassandra Clare',
            'categoria' => 3,
            'editorial' => 'Destino',
            'edicion' => 5,
            'fecha_publicacion' => 2010,
            'portada' => 'cazadoresDeSombras.jpg',
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
            'isbn' => '978-84-672-3978-2',
            'titulo' => 'La torre de la golondrina'.' | Ejemplar 2',
            'autor' => 'Adrej Sapkowski',
            'categoria' => 1,
            'editorial' => 'C??culo de Lectores',
            'edicion' => 2,
            'fecha_publicacion' => 2012,
            'portada' => 'laTorreDeLaGolondrina.jpg',
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
            'isbn' => '978-84-679-2509-8',
            'titulo' => 'Pok??mon Rub?? y Zafiro Vol. 2'.' | Ejemplar 2',
            'autor' => 'Hidenori Kusaka, Satoshi Yamamoto',
            'categoria' => 2,
            'editorial' => 'Norma Editorial',
            'edicion' => 1,
            'fecha_publicacion' => 2016,
            'portada' => 'pokemonRubiZafiro.jpeg',
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
    }
}
