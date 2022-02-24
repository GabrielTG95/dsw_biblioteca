<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory; /* Traits */

    protected $fillable = ['id','isbn','titulo','autor','categoria','editorial','edicion','fecha_publicacion','disponible'];

    public $table = 'libros';
}
