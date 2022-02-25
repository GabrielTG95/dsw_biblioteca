<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert(['id'=>1,'definicion' => 'Fantasía',]);
        Categoria::insert(['id'=>2,'definicion' => 'Manga',]);
        Categoria::insert(['id'=>3,'definicion' => 'Misterio',]);
        Categoria::insert(['id'=>4,'definicion' => 'Ciencia Ficción',]);
        Categoria::insert(['id'=>5,'definicion' => 'Aventuras',]);
        Categoria::insert(['id'=>6,'definicion' => 'Suspense',]);
        Categoria::insert(['id'=>7,'definicion' => 'Biografía',]);
        Categoria::insert(['id'=>8,'definicion' => 'Libro de texto',]);
        Categoria::insert(['id'=>9,'definicion' => 'Dominio Público',]);
    }
}
